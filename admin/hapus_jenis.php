<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$idjenis = $_GET["id_jenis"];

if( hapusjenis($idjenis) > 0 ) {
    echo "
    <script>
        alert('Jenis obat berhasil dihapus!');
        document.location.href = 'jenisobat.php';
    </script>
";
} else {
    echo "
    <script>
        alert('Jenis obat gagal dihapus!');
        document.location.href = 'jenisobat.php';
    </script>
";
}

?>