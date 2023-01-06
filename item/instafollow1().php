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
  $layanan = $_POST['layanan'];
  $pakt = $_POST['jumlah'];
  $harg = $_POST['harga'];

if ($ceklayanan == "1") {
  $layanan = "Instagram Followers Super Fast Server 1";
  $harga = $jumlah * 25;
  $kode = "1";
 } else {
  $status = "Error"; 
 }

  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<?php } else if (!$idignya) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<?php } else if ($pakt < 100) { ?>
<div class="alert alert-danger">
Gagal : Minimal Order 100.
</div>
<?php } else if ($pakt > 8000) { ?>
<div class="alert alert-danger">
Gagal : Maximal Order 8000.
</div>
<? } else {
$api_key = "SVNFL5YBQR4YSB3"; // API SV PANEL
$command = "add";  // tidak usah tidak papa atau hapus aja
$link = $usrnmlink;
$jumlah = $jumlah;
$postdata = 'api_key='.$api_key.'&link='.$link.'&jenis='.$ceklayanan.'&jumlah='.$jumlah.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://sv-panel.id/api.php');
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
$store = curl_exec ($ch);
curl_close ($ch);
$jsony = json_decode($store, true);
$msg = $jsony['reason']; // ini buat alasannya, contoh : API Key Salah
$orderid = $jsony['id']; // ini Order ID dari panelpedia kalau tidak di tambahkan tdk papa, tapi sebaiknya tambahkan biar lebih bagus

if($jsony['result'] == "error") {
echo "Perintah yang baru dilakukan ERROR!"; // disini adalah pesan yan dikeluarkan jika gagal
echo "Server Error : $msg"; // akan menampilkan balasan pesan dari server

} else if($jsony['result'] == "success") {

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harg WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$idignya','$pakt Instagram Followers Server $layanan','$harg','Sukses','Url/Username : $idignya','$tanggal')");
if($simpan) { ?>
    ====================================<br>
    Pesanan : <?php echo $pakt; ?> Instagram Followers Beres!<br>
    ID Instagram : <?php echo $idignya; ?><br>
    Server : <?php echo $layanan; ?><br>
    Price : <?php echo $pakt; ?> Likes = <?php echo $harg; ?><br><br>
    Order Success : No. Order <?php echo $order->no_order; ?><br>
    ====================================<br>
<? } ?>
<? } else { ?>
ERROR
<? }
} 
?>