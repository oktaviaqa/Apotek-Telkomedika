<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "telkomedika");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;

    }
    return $rows;
}


function tambah($data) {
    global $conn;
    $level = htmlspecialchars($data["level"]);
    $username = htmlspecialchars($data["username"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    
    //upload gambar
    $foto = upload();
    if( !$foto ){
        return false;
    }

    $query = "INSERT INTO admin
              VALUES
              ('', '$level', '$username', '$nama', '$email', '$password', '$foto')
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahpegawai($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama_pegawai"]);
    $jeniskel = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    
    //upload gambar
    $foto = upload();
    if( !$foto ){
        return false;
    }

    $query = "INSERT INTO pegawai
              VALUES
              ('', '$nama', '$jeniskel', '$alamat', '$foto')
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahjenisobat($data) {
    global $conn;
    $namajenisobat = htmlspecialchars($data["nama_jenisobat"]);
    
    //upload gambar
    $foto = upload();
    if( !$foto ){
        return false;
    }

    $query = "INSERT INTO jenis_obat
              VALUES
              ('', '$namajenisobat', '$foto')
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahobat($data) {
    global $conn;
    $kemasan   = htmlspecialchars($data["kemasan"]);
    $jenisobat = htmlspecialchars($data["jenis_obat"]);
    $nama_obat = htmlspecialchars($data["nama_obat"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]); 

    //upload gambar
    $foto = upload();
    if( !$foto ){
        return false;
    }

    $query = "INSERT INTO obat
    VALUES
    ('', '$kemasan', '$jenisobat', '$nama_obat', '$harga', '$deskripsi', '$foto')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
                alert('pilih foto terlebih dahulu!')
                </script>";
            return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
        alert('Yang anda upload bukan gambar')
        </script>";
    return false;
    }

    //cek jika ukuran terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
        alert('Ukuran gambar terlalu besar')
        </script>";
    return false;
    }

    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lols pengecekan gambar siap diupload
    move_uploaded_file($tmpName, 'img/upload/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($idadmin) {
    global $conn;
    mysqli_query($conn, "DELETE FROM admin WHERE id_admin = $idadmin");

    return mysqli_affected_rows($conn);
}

function hapususer($iduser) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id_user = $iduser");

    return mysqli_affected_rows($conn);
}

function hapuspegawai($idpegawai) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = $idpegawai");

    return mysqli_affected_rows($conn);
}

function hapusjenis($idjenis) {
    global $conn;
    mysqli_query($conn, "DELETE FROM jenis_obat WHERE id_jenis = $idjenis");

    return mysqli_affected_rows($conn);
}

function hapusobat($idobat) {
    global $conn;
    mysqli_query($conn, "DELETE FROM obat WHERE id_obat = $idobat");

    return mysqli_affected_rows($conn);
}

function ubahadmin($data) {
    global $conn;
    $idadmin = $data["id_admin"];
    $level = htmlspecialchars($data["level"]);
    $username = htmlspecialchars($data["username"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    
    //cek apakah user pilih gambar baru atau tidak
    if( $_FILES['foto']['error'] === 4) {
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE admin SET
                level = '$level',
                username = '$username',
                nama = '$nama',
                email = '$email',
                password = '$password',
                foto = '$foto'
            WHERE id_admin = $idadmin;
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahpegawai($data) {
    global $conn;
    $idpegawai = $data["id_pegawai"];
    $nama = htmlspecialchars($data["nama_pegawai"]);
    $jeniskel = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

       //cek apakah user pilih gambar baru atau tidak
       if( $_FILES['foto']['error'] === 4) {
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE pegawai SET
                nama_pegawai = '$nama',
                jenis_kelamin = '$jeniskel',
                alamat = '$alamat',
                foto = '$foto'
            WHERE id_pegawai = $idpegawai;
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahuser($data) {
    global $conn;
    $iduser = $data["id_user"];
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);

    $query = "UPDATE user SET
                nama = '$nama',
                username = '$username',
                password = '$password'
            WHERE id_user = $iduser;
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahjenis($data) {
    global $conn;
    $idjenis = $data["id_jenis"];
    $namajenisobat = htmlspecialchars($data["nama_jenisobat"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if( $_FILES['foto']['error'] === 4) {
     $foto = $gambarLama;
 } else {
     $foto = upload();
 }

    $query = "UPDATE jenis_obat SET
                nama_jenisobat = '$namajenisobat',
                foto            = '$foto'
            WHERE id_jenis = $idjenis;
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubahobat($data) {
    global $conn;
    $idobat = $data["id_obat"];
    $kemasan = htmlspecialchars($data["kemasan"]);
    $jenisobat = htmlspecialchars($data["jenis_obat"]);
    $namaobat = htmlspecialchars($data["nama_obat"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

       //cek apakah user pilih gambar baru atau tidak
       if( $_FILES['foto']['error'] === 4) {
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE obat SET
                kemasan     = '$kemasan',
                jenis_obat  = '$jenisobat',
                nama_obat   = '$namaobat',
                harga       = '$harga',
                deskripsi   = '$deskripsi',
                foto = '$foto'
            WHERE id_obat = $idobat;
              ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM admin
                WHERE
                nama LIKE '%$keyword%' OR
                username LIKE '%$keyword%' OR
                level LIKE '%$keyword%' OR
                email LIKE '%$keyword%'
                ";
    return query($query);
}

function register($data) {
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfirmasi = mysqli_real_escape_string($conn, $data["konfirmasi"]);

    //cek username sudah ada apa belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result) ){
        echo "<script>
                alert('username sudah terdaftar!')
                </script>
                ";
        return false;
    }
    
    //cek konfirmasi password
    if ( $password !== $konfirmasi ) {
        echo "
        <script>
            alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;
    }
         //enkripsi password
         $password = password_hash($password, PASSWORD_DEFAULT);
         

        //tambahkan ke database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$username','$password')");

        return mysqli_affected_rows($conn);
}

function cariuser($keyword) {
    $query = "SELECT * FROM user
                WHERE
                nama LIKE '%$keyword%' OR
                username LIKE '%$keyword%'
                ";
    return query($query);
}

function caripegawai($keyword) {
    $query = "SELECT * FROM pegawai
                WHERE
                nama_pegawai LIKE '%$keyword%' OR
                jenis_kelamin LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%'
                ";
    return query($query);
}


function cariobat($keyword) {
    $query = "SELECT * FROM obat
                WHERE
                jenis_obat LIKE '%keyword%' OR
                nama_obat LIKE '%$keyword%' OR
                harga LIKE '%$keyword%' OR
                deskripsi LIKE '%$keyword%'
                ";
    return query($query);
}

function carijenisobat($keyword) {
    $query = "SELECT * FROM jenis_obat
                WHERE
                nama_jenisobat LIKE '%$keyword%'
                ";
    return query($query);
}




?>