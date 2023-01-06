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
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','$pakt Followers Favorite/Retweet Server $layan','$harg','Sukses','Url/Username : $idignya','$tanggal')");
if($simpan) { 

?>
<?php
    $api_key = "SVNFL5YBQR4YSB3"; // 15 Random Kode Api Key Smart Voc anda
    $method = "order"; // Method jangan di ubah
    $layanan = "$layan"; // Kode layanan bisa dilihat di Tabel Layanan
    $jumlah = "$pakt"; // Jumlah order
    $username_link = "$idignya"; // Username atau link

    $url = "http://sv-panel.id/api.php?api_key=".$api_key."&method=".$method."&layanan=".$layanan."&username_link=".$username_link."&jumlah=".$jumlah;
    $get = file_get_contents($url);
    $order = json_decode($get);

if ($order->result == "error") { ?>
    Order error karena <?php echo $order->alasan; ?>
<? } else if ($order->result == "success") { ?>
    ====================================<br>
    Pesanan : <?php echo $pakt; ?> Favorite/Retweet Twitter Beres!<br>
    Link Twitter : <?php echo $idignya; ?><br>
    Server : <?php echo $layan; ?><br>
    Price : <?php echo $pakt; ?> Favorite/Retweet = <?php echo $harg; ?><br><br>
    Order Success : No. Order <?php echo $order->no_order; ?><br>
    ====================================<br>
<? } ?>
<? } else { ?>
ERROR
<? }
} 
?>