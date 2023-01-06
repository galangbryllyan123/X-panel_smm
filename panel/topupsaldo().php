<?php
// Script by Ichlas Wardy Gustama

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['penerima'];
  $jumlah = $_POST['jumlah'];

  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  $dapat = mysql_num_rows($cekuser);
  $data = mysql_fetch_array($cekuser);

  if ($get['saldo'] < $jumlah) { ?>
Gagal : Saldo tidak mencukupi.
<? } else if($jumlah < 0) { ?>
<div class="alert alert-danger">
Gagal : Gagal Bosku.
</div>
<? } else if($dapat == 0) { ?>
<div class="alert alert-danger">
Gagal : Username tidak terdaftar.
</div>
<? } else if(!$username1 || !$jumlah) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
 $simpan = mysql_query("UPDATE user SET saldo=saldo+$jumlah WHERE username = '$username1'");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$jumlah WHERE username = '$username'");
 if($simpan) { ?>
                                    <table class="table table-bordered responsive"><center>
      <tbody>
          <tr>
<tr>
<td><center>Recipient's Name</center></td>
<td class="center"><?php echo $data['nama']; ?></td>
</tr>
<tr>
<td><center>Username Recipients</center></td>
<td class="center"><?php echo $username1; ?></td>
</tr>
<tr>
<td><center>Total Balance</center></td>
<td class="center"><?php echo $jumlah; ?></td>
</tr>
<tr>
<td><center>Sender Balance</center></td>
<td class="center"><?php echo $username; ?></td>
</tr>
</div>
<? } else { ?>
ERROR
<? }
?>
<? }
?>
