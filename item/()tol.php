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

if ($paket == 'cfoxe') {
$harga = 40000;
} else if ($paket == 'excelent') {
$harga = 35000;
} else if ($paket == 'hyoota') {
$harga = 35000;
} else if ($paket == 'ipay') {
$harga = 40000;
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
$no = rand(11111,99999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
                    $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','$paket P.O Webtools','$harga','Belum','$email','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== P.O Webtools ====<br />
No.Order : <?php echo $no; ?><br />
Pembeli : <?php echo $get['nama']; ?><br />
Barang : P.O Webtools <?php echo $paket; ?><br />
Link Fb : <?php echo $email; ?><br />
Harga : <?php echo $harga; ?><br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== P.O Webtools ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap menunggu dan memberikan hasil Order Ke : <li><i class="fa fa-info"></i><a href="https://www.facebook.com/arieftamvans"> Admin1</a></li>
</div>
<? } else { ?>
ERROR
<? }
} 
?>