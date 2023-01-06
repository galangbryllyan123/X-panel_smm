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
  $usera = $_POST['usera'];
  $passworda = $_POST['passworda'];
  $packagea = $_POST['packagea'];
  $domaina = $_POST['domaina'];

if ($packagea == '100M Gold') {
$harga = 10000;
} else if ($packagea == '200M Gold') {
$harga = 20000;
} else if ($packagea == '300M Gold') {
$harga = 30000;
} else if ($packagea == '400M Gold') {
$harga = 40000;
} else {
$harga = a;
}
  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");
$simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','$packagea Dragon City ','$harga','Pending','Email : $usera -- Password : $passworda -- Paket : $packagea','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Dragon City Gold ====<br />
No.Order : <?php echo $no; ?><br />
Pembelian  <?php echo $packagea; ?><br />
Pembeli : <?php echo $get['nama']; ?><br />
Harga : <?php echo $harga; ?><br />
Email : <?php echo $usera; ?><br />
Password : <?php echo $passworda; ?><br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Dragon City Gold ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap memberikan hasil dan No.Order pada Admin jika terjadi error.
</div>
<?php echo $result ?>
<? } else { ?>
ERROR
<? }
} 
?>