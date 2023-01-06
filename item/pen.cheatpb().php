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
  $email = $_POST['email'];
  $paket = $_POST['paket'];

if ($paket == '3 Hari') {
$harga = 8000;
} else if ($paket == '14 Hari') {
$harga = 20000;
} else if ($paket == '21 Hari') {
$harga = 35000;
} else if ($paket == '30 Hari') {
$harga = 50000;
} else if ($paket == '60 Hari') {
$harga = 100000;
} else if ($paket == '90 Hari') {
$harga = 130000;
} else {
$tiket = a;
}
  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else if (!$email) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
                    $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','Perpanjang Cheat PB $paket','$harga','Pending','HWID : $email','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Perpanjang Cheat PB ====<br />
No.Order : <?php echo $no; ?><br />
Pembeli : <?php echo $get['nama']; ?><br />
Barang : <?php echo $paket; ?> Perpanjangan Cheat PB<br />
HWID : <?php echo $email; ?><br />
Harga : <?php echo $harga; ?><br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Perpanjang Cheat PB ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap menunggu dan memberikan hasil dan No.Order pada Admin.
</div>
<? } else { ?>
ERROR
<? }
} 
?>