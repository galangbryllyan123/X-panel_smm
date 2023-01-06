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
  $emaile = $_POST['emaile'];
  $paket = $_POST['paket'];
  $doimian = $_POST['doimian'];
  $passworde = $_POST['passworde'];

if ($paket == 'Biasa') {
$harga = 7000;
} else if ($paket == 'Standart') {
$harga = 27000;
} else if ($paket == 'Keren') {
$harga = 45000;
} else {
$harga = a;
}

  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else if (!$emaile) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','Template Paket $paket','$harga','Pending','Email : $emaile -- Password : $passworde -- Paket : Blog Paket $paket -- Link FB : $doimian','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Pembuatan Blogger ====<br />
No.Order : <?php echo $no; ?><br />
Pembeli : <?php echo $get['nama']; ?><br />
Barang :Blogger Paket <?php echo $paket; ?><br />
Domain : <?php echo $doimian; ?><br />
Harga : <?php echo $harga; ?><br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Pembuatan Blogger ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap menunggu dan memberikan hasil dan No.Order pada Admin.
</div>
<? } else { ?>
ERROR
<? }
} 
?>