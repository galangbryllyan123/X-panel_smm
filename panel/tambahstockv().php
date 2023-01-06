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
  $jenis = $_POST['jenis'];
  $isi = $_POST['isi'];
  $harga = $_POST['harga'];
  $kode = $_POST['kode'];

  $cekuser = mysql_query("SELECT * FROM stockcash WHERE jenis = '$jenis' && kodecash = '$kode'");  
  if(mysql_num_rows($cekuser) <> 0) { ?>
<div class="alert alert-danger">
Gagal : Kode cash sudah distock.
</div>
<? } else if(!$isi || !$harga || !$kode) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
 $simpan = mysql_query("INSERT INTO stockcash(isi, jenis, harga, kodecash) VALUES('$isi', '$jenis', '$harga', '$kode')");
 if($simpan) { ?>
<div class="alert alert-success"><center>
=== Tambah Stock Voucher ===<br />
Pendaftaran anggota baru sukses.<br />
Jenis : <?php echo $jenis; ?> <br />
Isi : <?php echo $isi; ?> <br />
Harga : <?php echo $harga; ?> <br />
Kode : <?php echo $kode; ?> <br />
=== Tambah Stock Voucher ===<br />
</center></div>
<? } else { ?>
ERROR
<? }
?>
<? }
?>