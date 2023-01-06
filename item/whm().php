<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $package = $_POST['packagea'];
  $domain = $_POST['domaina'];

if ($package == 'mini') {
$harga = 15000;
} else if ($package == 'medium') {
$harga = 20000;
} else if ($package == 'premium') {
$harga = 25000;
} else {
$harga = a;
}

  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else if (!$package || !$domain) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','WHM $package','$harga','Pending','WHM ~ Domain : [ $domain ] -- Package : [ $package ]','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Hosting ====<br />
No.Order : <?php echo $no; ?><br />
Pemesanan WHM <?php echo $package ?> sukses.<br />
Pembeli : <?php echo $get['nama']; ?><br />
Barang : WHM <?php echo $package ?><br />
Domain : <?php echo $domain; ?><br />
Package  : <?php echo $package ?><br />
Harga : <?php echo $harga; ?><br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Hosting ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap menunggu dan memberikan hasil dan No.Order pada Admin.
</div>
<? } else { ?>
ERROR
<? }
} 
?>