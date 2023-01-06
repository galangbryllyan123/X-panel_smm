<?php
//Script by Saifulloh Yusuf

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

  $link = $_POST['link'];
  $kode = $_POST['kode'];
  $jumlah = $_POST['jumlah'];

if($kode == '1'){
$harga = '18';
$min = '100';
$jenis = 'Instagram Followers Super Fast Server 1';
$total = $jumlah*$harga;
} else if($kode == '2'){
$harga = '18';
$min = '100';
$jenis = 'Instagram Followers HQ Fast Server 2';
$total = $jumlah*$harga;
} else if($kode == '3'){
$harga = '20';
$min = '100';
$jenis = 'Instagram Followers HQ Fast Server 3';
$total = $jumlah*$harga;
} else if($kode == '5'){
$harga = '20';
$min = '100';
$jenis = 'Instagram Likes Super Fast';
$total = $jumlah*$harga;
} else if($kode == '5'){
$harga = '22';
$min = '100';
$jenis = 'Instagram Likes Super Fast';
$total = $jumlah*$harga;
} else if($kode == '6'){
$harga = '23';
$min = '100';
$jenis = 'Twitter Followers Instant';
$total = $jumlah*$harga;
} else if($kode == '7'){
$harga = '14';
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
$harga = '93';
$min = '250';
$jenis = 'Facebook Fanspage Likes Start 24jam';
$total = $jumlah*$harga;
} else if($kode == '11'){
$harga = '18';
$min = '100';
$jenis = 'Soundcloud Plays Fast';
$total = $jumlah*$harga;
} else if($kode == '12'){
$harga = '18';
$min = '100';
$jenis = 'Facebook Photo/Post Likes Fast';
$total = $jumlah*$harga;
} else if($kode == '13'){
$harga = '18';
$min = '100';
$jenis = 'Vine Followers';
$total = $jumlah*$harga;
} else if($kode == '14'){
$harga = '18';
$min = '100';
$jenis = 'Vine Likes';
$total = $jumlah*$harga;
} else if($kode == '15'){
$harga = '18';
$min = '100';
$jenis = 'Vine Revines';
$total = $jumlah*$harga;
} else if($kode == '16'){
$harga = '18';
$min = '100';
$jenis = 'Vine Loops';
$total = $jumlah*$harga;
} else if($kode == '19'){
$harga = '18';
$min = '100';
$jenis = 'Website Traffic Fast';
$total = $jumlah*$harga;
}

  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<?php } else if ($pakt < 100) { ?>
<div class="alert alert-danger">
<marquee><h1>Maaf Bos ku,jangan bug disini.</h1></marquee>
</div>
<?php } else if ($pakt > 100000) { ?>
<div class="alert alert-danger">
Gagal : Maximal Order 8000.
</div>
<? } else {

$no = rand(111111,999999);
$tanggal = date("Y-m-d H:i:s");
$api_key = "bv72gub15q1e1u2npir6ksoe805f8hh";

    $postdata = 'api_key='.$api_key.'&link='.$link.'&jenis='.$kode.'&jumlah='.$jumlah.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://panelpedia.id/api.php');
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
$store = curl_exec ($ch);
curl_close ($ch);
$json = json_decode($store,true);

if($json['result'] == "success"){

$simpan = mysql_query("UPDATE user SET saldo=saldo-$total WHERE username = '$username'");
$simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$username','$jenis','$total','Processing','Username : $target Jumlah : $jumlah','$tanggal')");

echo '
<table class="table table-bordered responsive"><center>
      <tbody>
          <tr>
<div class="alert alert-success">Processing '.$jenis.'<center>
</tr><tr>
<td><center><i class="fa fa-info"></i></center></td>
<td class="center">'.$jenis.'</td>
</tr>
<tr>
<td><center><i class="fa fa-info"></i></center></td>
<td class="center">INVOICE : #'.$no.'</td>
</tr>
<tr>
<td><center><i class="fa fa-user"></i></center></td>
<td class="center">Username : '.$link.'</td>
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
<td class="center">Pembeli : '.$username.'</td>
</tr>
</center></div>';// result jika berhasil
} else {
echo $json['reason']; // result jika gagal
}
}
}
?>