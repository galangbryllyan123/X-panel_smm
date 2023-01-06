<?php
//Script By Aqshal
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:HomePage/'); 
}
else { 
    $usr = $_SESSION['username']; 
}
  require_once("../koneksi.php");
$query = mysql_query("SELECT * FROM user WHERE username = '$usr'");
$get = mysql_fetch_array($query);
?>
<?php
function acak($panjang)
{
	$karakter= '1234694VFWF0362KAKHR45678VUFVUYW91509650136XTFHCDW90AQWVXCO';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}

  $nama = $get['nama'];
  $targetz = $_POST['usrnmlink'];
  $srv = $_POST['layanan'];
  $pakt = $_POST['jumlah'];
  $harg = $_POST['harga'];
  $peler = "2";
  $no = acak(5);

if ($srv == 1) {
$jenis = 1;
$cekv = $pakt * 19;
$pkt = 'Instagram Followers Super Fast Server 1 | Max 8000 Followers';
$ordz = 'Instagram Followers';
$min = 100;
$max = 8000;
} else if ($srv == 2) {
$jenis = 2;
$cekv = $pakt * 17;
$pkt = 'Instagram Likes Super Fast | Max 10000 Likes';
$ordz = 'Instagram Likes';
$min = 100;
$max = 10000;
} else if ($srv == 5) {
$jenis = 3;
$cekv = $pakt * 30;
$pkt = 'Twitter Followers Instant | Max 30000 Followers';
$ordz = 'Twitter Followers';
$min = 100;
$max = 30000;
} else if ($srv == 7) {
$jenis = 6;
$cekv = $pakt * 21;
$pkt = 'Youtube Views Super Fast | Max 1000000 Views';
$min = 1000;
$max = 1000000;
} else if ($srv == 4) {
$jenis = 7;
$cekv = $pakt * 100;
$pkt = 'Facebook Fanspage Likes Start 24jam | Max 1000000 Likes';
$ordz = 'Facebook Likes Fanspage';
$min = 250;
$max = 1000000;
} else if ($srv == 6) {
$jenis = 8;
$cekv = $pakt * 20;
$pkt = 'Soundcloud Plays Fast | Max 1000000 Plays';
$ordz = 'SoundCloud Plays';
$min = 100;
$max = 1000000;
} else if ($srv == 3) {
$jenis = 9;
$cekv = $pakt * 20;
$pkt = 'Facebook Photo/Post Likes Fast | Max 9400 Likes';
$ordz = 'Facebook Likes Photo/Post';
$min = 100;
$max = 9400;
}

if ($get['saldo'] < $cekv) { ?>
<div class="alert alert-danger">
<b>ERROR</b> : Maaf, Saldo anda kurang!!<br> Silahkan topup saldo ke Reseller / Admin terdekat!!
</div>
<? } else if ($pakt < $min) { ?>
<div class="alert alert-danger">
<b>ERROR</b> : Anda telah memasukkan kurang dari batas Min. Order yang telah ditentukan!! Silahkan masukkan Min. Order <?php echo $min; ?>
</div>
<? } else if ($pakt > $max) { ?>
<div class="alert alert-danger">
<b>ERROR</b> : Anda telah memasukkan melebihi dari batas Max. Order yang telah ditentukan!! Silahkan masukkan Max. Order <?php echo $max; ?>
</div>
<? } else {
        $api_key = "ZM1W8V34193Q9KJ"; // isikan 15 digit API_Key dari ZM-Panel
	$type = $jenis; // tipe service yang anda inginkan (Silahkan cek di tabel Layanan ZM-Panel)
	$target = $targetz; // target untuk proses
	$jumlah = $pakt; // jumlah untuk proses
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"http://zoltmart.com/api/api.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"api_key=$api_key&type=$type&target=$target&jumlah=$jumlah");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	
	$decoded = json_decode($result, true);
	if($decoded['error']){
		echo "[".$decoded['status']."] ".$decoded['error'];
	} else {

$tggl = date("Y-m-d H:i:s");
	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$cekv WHERE username = '$usr'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$usr','$pkt','$cekv','Proccess',' $targetz','$tggl')");
          $simpan = mysql_query("UPDATE user SET poin=poin+$peler WHERE username = '$usr'");
?>
<div class="alert alert-info alert-dismissable">
=========================<br>
Pembelian <?php echo $ordz; ?> Sukses...<br>
=========================<br>
ID Order : #<?php echo $no; ?><br>

Pengirim : <?php echo $nama; ?><br>

Target : <?php echo $target; ?><br>

Jumlah : <?php echo $pakt; ?> <?php echo $ordz; ?><br>

Harga : <?php echo $cekv; ?><br>

Status : In Progress<br>
=========================<br>
</div>
<? } } ?>