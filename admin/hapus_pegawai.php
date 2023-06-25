<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$idpegawai = $_GET["id_pegawai"];

if( hapuspegawai($idpegawai) > 0 ) {
    echo "
    <script>
        alert('pegawai berhasil dihapus!');
        document.location.href = 'pegawai.php';
    </script>
";
} else {
    echo "
    <script>
        alert('pegawai gagal dihapus!');
        document.location.href = 'pegawai.php';
    </script>
";
}

?>