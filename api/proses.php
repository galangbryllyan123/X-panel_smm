<?php
session_start();
if(isset($_POST['apikey'])) {
require_once("../koneksi.php");
$apikey = $_POST['apikey'];
$userlink = $_POST['target'];
$kode = $_POST['id'];
$jumlah = $_POST['jumlah'];
$afi = mysql_query("SELECT * FROM api WHERE apikey = '$apikey'");
$api = mysql_fetch_array($afi);
$cekapi = mysql_num_rows($afi);
$nama = $api['nama'];
$username = $api['username'];

$has = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($has);

if($kode == '1'){
$harga = '17';
$min = '100';
$jenis = 'Instagram Followers Super Fast Server 1';
$total = $jumlah*$harga;
} else if($kode == '2'){
$harga = '19';
$min = '100';
$jenis = 'Instagram Followers HQ Fast Server 2';
$total = $jumlah*$harga;
} else if($kode == '3'){
$harga = '23';
$min = '100';
$jenis = 'Instagram Followers HQ Fast Server 3';
$total = $jumlah*$harga;
} else if($kode == '5'){
$harga = '15';
$min = '100';
$jenis = 'Instagram Likes Super Fast';
$total = $jumlah*$harga;
} else if($kode == '6'){
$harga = '30';
$min = '100';
$jenis = 'Twitter Followers Instant';
$total = $jumlah*$harga;
} else if($kode == '7'){
$harga = '29';
$min = '100';
$jenis = 'Twitter Retweets Instant';
$total = $jumlah*$harga;
} else if($kode == '8'){
$harga = '29';
$min = '100';
$jenis = 'Twitter Favorites Instant';
$total = $jumlah*$harga;
} else if($kode == '9'){
$harga = '14';
$min = '1000';
$jenis = 'Youtube Views Super Fast';
$total = $jumlah*$harga;
} else if($kode == '10'){
$harga = '94';
$min = '250';
$jenis = 'Facebook Fanspage Likes Start 24jam';
$total = $jumlah*$harga;
} else if($kode == '11'){
$harga = '19';
$min = '100';
$jenis = 'Soundcloud Plays Fast';
$total = $jumlah*$harga;
} else if($kode == '12'){
$harga = '19';
$min = '100';
$jenis = 'Facebook Photo/Post Likes Fast';
$total = $jumlah*$harga;
} else if($kode == '13'){
$harga = '19';
$min = '100';
$jenis = 'Vine Followers';
$total = $jumlah*$harga;
} else if($kode == '14'){
$harga = '19';
$min = '100';
$jenis = 'Vine Likes';
$total = $jumlah*$harga;
} else if($kode == '15'){
$harga = '19';
$min = '100';
$jenis = 'Vine Revines';
$total = $jumlah*$harga;
} else if($kode == '16'){
$harga = '19';
$min = '100';
$jenis = 'Vine Loops';
$total = $jumlah*$harga;
}

if($cekapi == '0') { ?>
{"result":"false","msg":"Api tidak terdaftar dalam sistem"}
<?php } else  if ($hasil['saldo'] < $total) { ?>
{"result":"false","msg":"Saldo tidak mencukupi"}
<? } else if ($jumlah < $min) { ?>
{"result":"false","msg":"Jumlah minimal 100"}
<? } else if(!$userlink || !$kode || !$jumlah) { ?>
{"result":"false","msg":"Masih terdapat data kosong"}
<? } else if (!preg_match("/^[0-9]*$/",$jumlah)) { ?>
{"result":"false","msg":"Jumlah tidak benar"}
<?php } else {
$no = rand(111111111,999999999);
$tanggal = date("Y-m-d");
$api_key = "bv72gub15q1e1u2npir6ksoe805f8hh";

    $postdata = 'api_key='.$api_key.'&link='.$userlink.'&jenis='.$kode.'&jumlah='.$jumlah.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://panelpedia.id/api.php');
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
$store = curl_exec ($ch);
curl_close ($ch);
$json = json_decode($store,true);
$nomeridnya = $json['id'];

if($json['result'] == "success"){
	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$total WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$nomeridnya','$username','$jenis (VIA API)','$total','Processing','Url/Username : $userlink Jumlah : $jumlah','$tanggal')");

?>{"result":"true","no":"<?php echo $nomeridnya; ?>","userlink":"<?php echo $userlink; ?>","barang":"<?php echo $info; ?>","pembeli":"<?php echo $nama; ?>","harga":"<?php echo $total; ?>"}<?php 
} else { ?>
{"result":"false","msg":"<?php echo $json['reason']; ?>"}
<?php   
}
}
} 
?>