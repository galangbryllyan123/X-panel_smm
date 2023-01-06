<?php
if($_POST['gen']) {
function acak($panjang)
{
	$karakter= 'SCSGAN083713L8201MABZ080018SCSCLMA1KALMZN0193H018264AlMZNFI012644753VJHALKLA284APZXCCVBNBBEYWPQ0014810135631TQWPMBHXZML01381ALQPL93710';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}
$lol = acak(5);
$date=date('Y-m-d', time()+60*60*7);
$tanggal = $date;
  require("../koneksi.php");
  $kode1 = FMCM;
  $kode2 = acak(4);
  $kode3 = acak(4);
  $kode4 = acak(4);
  $kode5 = acak(4);

$kode0 = $kode1.'-'.$kode2.'-'.$kode3.'-'.$kode4.'-'.$kode5;
$cekuser = mysql_query("SELECT * FROM voc WHERE kode = '$kode0'");
$jumlah = str_replace("-","",$_POST['jumlah']);
$as = "Rp.".number_format((double)$jumlah,0,',','.');
if ($data['level'] == MemberFree) {
echo "ERROR : Tidak ada akses";
}else if($data['saldo'] < $jumlah) {
echo 'Saldo tidak cukup';
}else if(mysql_num_rows($cekuser) !== 0) {
 echo "Invite Code Sudah Ada, silahkan submit lagi";
}else{
 $jam = date('H:i:s d-m-Y');
 $simpan = mysql_query("INSERT INTO voc VALUES('$kode0','$jumlah','aktif')");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$jumlah WHERE username = '$username'");
if($simpan) {
echo 'Generate Voucher Success!<br>
                                    <table class="table table-boxed">
                                        <tbody>
                                                <div class="alert alert-success">Generate Saldo Sucksess!!!</div>
                                            <tr>
                                                <th><i class="fa fa-money"></i></th>
                                                <td>'."Rp.".number_format((double)$jumlah,0,',','.'). '</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-card"></i></th>
                                                <td>' . $kode0. '</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-shopping-cart"></i></th>
                                                <td>Kode Vocher</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-level-up"></i></th>
                                                <td>' . $data['nama']. '</td>
                                            </tr>
                                        </tbody>
                                    </table><!--//table-->
} else {
echo 'Generate Voucher Gagal!';
}
}
}
?>