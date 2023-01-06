<?php
if($_POST) {
function acak($panjang)
{
	$karakter= '98yfn9y21nc9y1fn92cyrf129ycnr912npfuvn103uhcn18hgf8n1cuhed0c12h';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}
$lol = acak(5);
$lol2 = $lol;
$date=date('Y-m-d', time()+60*60*7);
$tanggal = $date;
  require("../koneksi.php");
  $kode1 = $_POST['kode1'];
  $kode2 = $_POST['kode2'];
  $kode3 = $_POST['kode3'];
  $kode4 = $_POST['kode4'];
  $kode5 = $_POST['kode5'];

$kode0 = $kode1.'-'.$kode2.'-'.$kode3.'-'.$kode4.'-'.$kode5;
$cekuser = mysql_query("SELECT * FROM voc WHERE kode = '$kode0'");
$hasil = mysql_fetch_array($cekuser);
$jumlah = $hasil['jumlah'];
$as = "Rp.".number_format((double)$jumlah,0,',','.');
if($hasil['status'] == 'tidak') {
echo "Voucher sudah digunakan";
}else if(mysql_num_rows($cekuser) == 0) {
 echo '<script type="text/javascript">
             alert("Code Tidak Valid !!");</script>';
}else{
 $jam = date('H:i:s d-m-Y');
 $simpan = mysql_query("UPDATE user SET saldo=saldo+$jumlah WHERE username = '$username'");
 $simpan = mysql_query("UPDATE voc SET status= 'tidak' WHERE kode = '$kode0'");
 if($simpan) {
echo 'Isi Saldo Host-Voc Success!<br>
=========================<br>
Voucher Code : ' . $kode0. '<br>
Isi Voucher :  ' ."Rp.".number_format((double)$jumlah,0,',','.'). '<br>
=========================<br>
NB : Simpan Catatan Ini Sebagai Bukti Transaksi!<br>';
} else {
echo 'Isi Saldo Akun Gagal!<br>';
}
}
}
?>