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

error_reporting(0);
if(isset($_POST['link'])){


    $api_key = "SVNFL5YBQR4YSB3"; // Api Key Smart Voc Anda (15 Random karakter)
    $method = "order"; // Method jangan di ubah
    $layanan = $_POST['kode']; // Kode layanan bisa dilihat di Tabel Layanan
    $jumlah = $_POST['jumlah']; // Jumlah order
    $username_link = $_POST['link']; // Link / Username Target

   

if($layanan == '1'){
$harga = '21';
$total = $jumlah*$harga;
$info = "Instagram Followers Super Fast Server 1";
if($layanan == '9'){
$harga = '21';
$total = $jumlah*$harga;
$info = "Youtube Views Super Fast";
if($layanan == '111'){
$harga = '21';
$total = $jumlah*$harga;
$info = "Facebook Photo/Post Likes (High Quality & Instant)";
}

if($get['saldo'] < $total){
echo 'Saldo Tidak Cukup';
} else {

$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");
$url = "http://sv-panel.id/api.php?api_key=".$api_key."&method=".$method."&layanan=".$layanan."&username_link=".$username_link."&jumlah=".$jumlah;
    $get = file_get_contents($url);
    $order = json_decode($get);
if($order->result == "error") {
echo "Perintah yang baru dilakukan ERROR!"; // disini adalah pesan yan dikeluarkan jika gagal
echo "Server Error : $order->alasan"; // akan menampilkan balasan pesan dari server
} else if($order->result == "success") {
$simpan = mysql_query("UPDATE user SET saldo=saldo-$total WHERE username = '$username'");
$simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','$jumlah $info','$total','Sukses','Username : $username_link','$tanggal')");

echo '
<table class="table table-bordered responsive"><center>
      <tbody>
          <tr>
<div class="alert alert-danger"><center>
</tr><tr>
<td><center><i class="fa fa-info"></i></center></td>
<td class="center">'.$info.'</td>
</tr>
<tr>
<td><center><i class="fa fa-info"></i></center></td>
<td class="center">Username : '.$username_link.'</td>
</tr>
<tr>
<td><center><i class="fa fa-money"></i></center></td>
<td class="center">Jumlah : '.$jumlah.'</td>
</tr>
<tr>
<td><center><i class="fa fa-money"></i></center></td>
<td class="center">Harga : '.$total.'</td>
</tr>
<tr>
<td><center><i class="fa fa-user"></i></center></td>
<td class="center">VP-PANEL</td>
</tr>
</center></div>'; //* You Can Change This'; //* Hasil Jika Berhasil
echo "Server Reply : $msg"; // akan menampilkan balasan pesan dari server
}
}
}
?>