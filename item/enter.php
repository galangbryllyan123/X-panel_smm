<?php
session_start();
include "koneksi.php";
if(!isset($_SESSION['username'])) {
header("location:/");
} else {
$username = $_SESSION['username'];
$sql = mysql_query("SELECT * FROM user WHERE username = '$username'");
$cek = mysql_num_rows($sql);
$fet = mysql_fetch_array($sql);
if($cek == 0) {
header("location:index.php");
}
}
?>