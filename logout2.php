<?php
session_start();
unset($_SESSION['username']);
     header("location:login.php?pesan=1&isi=Akun anda telah di banned.");
?>
