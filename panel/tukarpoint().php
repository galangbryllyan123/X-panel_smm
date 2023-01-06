<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
if ( !isset($_SESSION['username']) ) {
    header('location:../login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
require_once('../koneksi.php');
$query = mysql_query("SELECT * FROM user WHERE username = '$usr'");
$hasil = mysql_fetch_array($query);
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

$jumlah = $_POST['jumlah'];
$idord = acak(4);
$uplink = $hasil['nama'];
$sisasld = $hasil['saldo'];
$tggl = date('Y-m-d');
$total = $_POST['total'];
$namas = $hasil['nama'];

if ($jumlah == 1) {
$bonus = "1000";
$kurang = "50";
$kata = "Tukar 10 Poin ke Saldo";
} else if ($jumlah == 2) {
$bonus = "2000";
$kurang = "100";
$kata = "Tukar 100 Poin ke Saldo";
} else if ($jumlah == 3) {
$bonus = "10000";
$kurang = "500";
$kata = "Tukar 500 Poin ke Saldo";
} else if ($jumlah == 4) {
$bonus = "20000";
$kurang = "1000";
$kata = "Tukar 1000 Poin ke Saldo";
}

if ($hasil['poin'] < $kurang) { ?>
<div class="alert alert-danger">
ERROR : Maaf, Poin anda kurang! Silahkan tingkatkan transaksi anda!!
</div>
<? } else if ($jumlah < 0) { ?>
<div class="alert alert-danger">
ERROR : Maaf, Paket yang anda cari tidak ditemukan!
</div>
<? } else if ($jumlah > 5) { ?>
<div class="alert alert-danger">
ERROR : Maaf, Paket yang anda cari tidak ditemukan!
</div>
<? } else {
$simpan = mysql_query("UPDATE user SET saldo=saldo+$bonus WHERE username = '$usr'");
$simpan = mysql_query("UPDATE user SET poin=poin-$kurang WHERE username = '$usr'");
?>
<div class="alert alert-info alert-dismissable">
=========================<br>
Tukar Poin Sukses...<br>
=========================<br>
ID Tukar : #<?php echo $idord; ?><br>

Nama Anda : <?php echo $namas; ?><br>

Total Poin yang ditukar : <?php echo $bonus; ?><br>

Saldo yang didapatkan : <?php echo "Rp ".number_format((double)$bonus,0,',','.'); ?><br>

Status : <?php echo $kurang; ?> Poin Sukses ditukar! <br>
=========================<br>
</div>
<? } ?>
