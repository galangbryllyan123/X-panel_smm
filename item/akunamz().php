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
  $paket = $_POST['paket'];

 $caridata = mysql_query("SELECT * FROM amazon WHERE id = '$paket'");
 $data = mysql_num_rows($caridata);
 $dapat = mysql_fetch_array($caridata);
 
if ($data == 0) { ?>
<div class="alert alert-danger">
<b>Gagal :</b> Stock kosong.
</div>
<? } else if ($get['saldo'] < $dapat['harga']) { ?>
<div class="alert alert-danger">
<b>Gagal :</b> Saldo tidak mencukupi.
</div>
<? } else {
$noorder = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");
$harga = $dapat['harga'];
$isi = $dapat['isi'];
$jenis = $dapat['jenis'];
$kode = $dapat['kodecash'];
	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$noorder','$username','$isi $jenis','$harga','Sukses','-','$tanggal')");
if($simpan) { 

?>
<div class="alert alert-success"><center>
==== Akun Amazon ====<br />
Pembelian Akun Amazon <?php echo $jenis; ?> sukses.<br />
Pembeli : <?php echo $get['nama']; ?><br />
Isi Akun : <?php echo $isi; ?> <?php echo $jenis; ?><br />
Harga : <?php echo $harga; ?><br />
Email+Pass : <?php echo $kode; ?> <br />
Tgl. Transaksi : <?php echo $tanggal; ?> <br />
==== Akun Amazon ====
</center></div>
<div class="alert alert-warning">
Perhatian : Harap buka ulang fitur setelah melakukan submit. Untuk merefresh data.
</div>
<? 
mysql_query("DELETE FROM amazon WHERE id='$paket'");
} else { ?>
ERROR
<? }
} 
?>