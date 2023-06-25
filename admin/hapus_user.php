<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$iduser = $_GET["id_user"];

if( hapususer($iduser) > 0 ) {
    echo "
    <script>
        alert('user berhasil dihapus!');
        document.location.href = 'user.php';
    </script>
";
} else {
    echo "
    <script>
        alert('user gagal dihapus!');
        document.location.href = 'user.php';
    </script>
";
}

?>