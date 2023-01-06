<?php
// Script by Ichlas Wardy
session_start();
require_once("koneksi.php");
$username = $_POST['username'];
$pass = $_POST['password'];
$cekuser = mysql_query("SELECT * FROM user WHERE username = '$username'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
if($jumlah == 0) {
   header("location:login.php?pesan=1&isi=Username : $username belum terdaftar.");
} else {
   if($pass <> $hasil['password']) {
     header("location:login.php?pesan=1&isi=Password yang anda masukkan salah.");
   } else {
     $_SESSION['username'] = $hasil['username'];
     header('location:/');
   }
}
?>