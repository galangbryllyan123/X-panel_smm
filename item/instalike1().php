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
  $idignya = $_POST['usrnmlink'];
  $layan = $_POST['layanan'];
  $pakt = $_POST['jumlah'];
  $harg = $_POST['harga'];

  if ($get['saldo'] < $harg) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else if (!$idignya) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harg WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','$pakt Likers Instagram Server $layan','$harg','Sukses','Url/Username : $idignya','$tanggal')");
if($simpan) { 

?>
   <div class="alert alert-info">
    ====================================<br>
    Pesanan : <?php echo $pakt; ?> Likes Instagram Beres!<br>
    Link Photo Instagram : <?php echo $idignya; ?><br>
    Server : <?php echo $layan; ?><br>
    Price : <?php echo $pakt; ?> Likes = <?php echo $harg; ?><br>
    Order Success : No. Order <?php echo $no; ?><br>
    ====================================<br>
   </div>
<?php
$apikey = "RPeqm1fcwk";
$command = "add";
$link = "$idignya";
$kode = "$layan";
$jumlah = "$pakt";
$url = "http://rival-panel.com/api/?apikey=$apikey&order=$command&link=$link&service=$kode&jumlah=$jumlah";
$jsonx = file_get_contents($url);
$jsony = json_decode($jsonx);
$msg = $jsony['ServerResponse'];
if($jsony['error'] == "1") {
echo "Perintah yang baru dilakukan ERROR!"; // disini adalah pesan yan dikeluarkan jika gagal
echo "Server Error : $msg"; // akan menampilkan balasan pesan dari server
} else if($jsony['error'] == "0") {
echo "Pesananan Ada Berhasil"; // Ubah jika berhasil akan menampilkan kode seperti apa
echo "Server Reply : $msg"; // akan menampilkan balasan pesan dari server
}
?>
<? } else { ?>
ERROR
<? }
} 
?>