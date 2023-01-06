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
  $email = 'admin@excellent.team';

if ($packagea == 'Mini') {
$harga = 4000;
} else if ($packagea == 'Medium') {
$harga = 9000;
} else if ($packagea == 'Premium') {
$harga = 16000;
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
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','cPanel $packagea','$harga','Pending','Username : $usera -- Pw : $passworda -- Package : $packagea -- Domain : $domaina ','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Hosting ====<br />
No.Order : <?php echo $no; ?><br />
Pembelian cPanel X <?php echo $packagea; ?><br />
Pembeli : <?php echo $get['nama']; ?><br />
Harga : <?php echo $harga; ?><br />
Username : <?php echo $usera; ?><br />
Password : <?php echo $passworda; ?><br />
Domain : <?php echo $domaina; ?><br />
Package : <?php echo $packagea; ?><br />
Login : <?php echo $domaina; ?>:2083<br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Hosting ====
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