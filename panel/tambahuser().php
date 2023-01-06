<?php
// Script by Sebastian Wirajaya Licensed

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $facebook = $_POST['facebook'];
  $level = $_POST['level'];

if ($level == MemberFree) {
$harga = 0;
$bonus = 0;
} else if ($level == Member) {
$harga = 10000;
$bonus = 5000;
} else if ($level == Reseller) {
$harga = 100000;
$bonus = 50000;
} else if ($level == Agen) {
$harga = 30000;
$bonus = 15000;
} else {
$tiket = a;
}
  if ($hasil['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else {
  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  if(mysql_num_rows($cekuser) <> 0) { ?>
<div class="alert alert-danger">
Gagal : Username sudah terdaftar.
</div>
<? } else if(!$username1 || !$password || !$nama) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
 $simpan = mysql_query("INSERT INTO user(facebook,username, password, nama, level, saldo, poin, uplink) VALUES('$facebook','$username1', '$password', '$nama', '$level', '$bonus','2','$username')");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
 if($simpan) { ?>
<table class="table table-bordered responsive"><center>
      <tbody>
          <tr>
<tr>
<td><center>Name Registrant</center></td>
<td class="center"><?php echo $username; ?></td>
</tr>
<tr>
<td><center>Registration price</center></td>
<td class="center"><?php echo $harga ?></td>
</tr>
<tr>
<td><center>Name Anggota</center></td>
<td class="center"><?php echo $nama; ?></td>
</tr>
<tr>
<td><center>Username</center></td>
<td class="center"><?php echo $username1; ?></td>
</tr>
<tr>
<td><center>Password</center></td>
<td class="center"><?php echo $password; ?></td>
</tr>
<tr>
<td><center>Facebook Id</center></td>
<td class="center"><?php echo $facebook; ?> <br /></td>
</tr>
<tr>
<td><center>Level</center></td>
<td class="center"><?php echo $level; ?></td>
</tr>
<tr>
<td><center>Bonus Balance</center></td>
<td class="center"><?php echo $bonus; ?></td>
</tr>
<? } else { ?>
ERROR
<? }
?>
<? }
}
?>