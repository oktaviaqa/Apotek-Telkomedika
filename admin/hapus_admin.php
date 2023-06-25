<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$idadmin = $_GET["id_admin"];

if( hapus($idadmin) > 0 ) {
    echo "
    <script>
        alert('data berhasil dihapus!');
        document.location.href = 'admin.php';
    </script>
";
} else {
    echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = 'admin.php';
    </script>
";
}
?>