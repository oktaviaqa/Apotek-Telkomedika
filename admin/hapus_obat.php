<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$idobat = $_GET["id_obat"];

if( hapusobat($idobat) > 0 ) {
    echo "
    <script>
        alert('obat berhasil dihapus!');
        document.location.href = 'dataobat.php';
    </script>
";
} else {
    echo "
    <script>
        alert('obat gagal dihapus!');
        document.location.href = 'dataobat.php';
    </script>
";
}

?>