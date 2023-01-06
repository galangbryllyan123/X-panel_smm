<?php
session_start();
require_once("../koneksi.php");
if($_SESSION['username'] == '') {
header('location:/?pesan=Mohon masuk dahulu!');
} else {
$username = $_SESSION['username'];
}
if(isset($_POST['reset'])) {
$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
$nama = $hasil['nama'];

$afi = mysql_query("SELECT * FROM api WHERE username = '$username'");
$api = mysql_fetch_array($afi);
$cekapi = mysql_num_rows($afi);

$harga = '500';

if($cekapi == 0) { ?>
<div class="alert alert-danger">
Gagal : Belum mempunyai APIKEY.
</div>
<?php } else  if ($hasil['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<?php } else {
 $key = md5(uniqid(rand(), true));
 $simpan = mysql_query("UPDATE api SET apikey = '$key' WHERE username = '$username'");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
 if($simpan) { ?>
==========RESET==========<br />
Nama : <?php echo $nama; ?><br />
Username : <?php echo $username; ?><br />
Apikey : <?php echo $key; ?><br />
==========RESET==========
<?php } else { ?>
ERROR....
<?php   }
   }
} ?>