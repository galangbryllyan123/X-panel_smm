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
  $nama = $get['nama'];
  $idignya = $_POST['usrnmlink'];
  $layan = $_POST['layanan'];
  $pakt = $_POST['jumlah'];
  $harg = $_POST['harga'];
  $peler = "2";

  if ($get['saldo'] < $harg) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else if ($pakt < '') { ?>
<div class="alert alert-danger">
Gagal : Minimal Jumlah 50.
</div>
<? } else if ($harg < '1250') { ?>
<div class="alert alert-danger">
Panel Ini Anti Bug Lol :p
</div>
<? } else if (!$idignya) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harg WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$nama','$pakt Like FansPage Facebook Code $layan','$harg','Proccess',' $idignya','$tanggal')");
	  $simpan = mysql_query("UPDATE user SET poin=poin+$peler WHERE username = '$username'");
if($simpan) { 


?>
<div class="alert alert-info">
   ====================================<br>
    Pesanan : <?php echo $pakt; ?> Like FansPage Facebook<br>
    Link Fanspage : <?php echo $idignya; ?><br>
    Kode : <?php echo $layan; ?><br>
    Price : <?php echo $pakt; ?> Like = <?php echo $harg; ?>Saldo<br>
    ====================================<br>
<?php
    $apikey = "RPeih3v1vg";
    $command = "add";
    $link = "$idignya";
    $kode = "$layan";
    $jumlah = "$pakt";
    $url = "http://rival-panel.com/api/?apikey=$apikey&order=$command&link=$link&service=$kode&jumlah=$jumlah";
$jsonx = file_get_contents($url);
$jsony = json_decode($jsonx, true);
$msg = $jsony['ServerResponse'];
if($jsony['error'] == "1") {
echo "Perintah yang baru dilakukan ERROR!"; // disini adalah pesan yan dikeluarkan jika gagal
echo "Server Error : $msg"; // akan menampilkan balasan pesan dari server
} else if($jsony['error'] == "0") {
echo "  "; // Ubah jika berhasil akan menampilkan kode seperti apa
echo "Status : $msg"; // akan menampilkan balasan pesan dari server
}
?>
<? } else { ?>
ERROR
<? }
} 
?>