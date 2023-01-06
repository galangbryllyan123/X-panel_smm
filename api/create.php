<?php
session_start();
if($_SESSION['username'] == '') {
header('location:/?pesan=Mohon masuk dahulu!');
} else {
$username = $_SESSION['username'];
}
if(isset($_POST['create'])) {
require_once("../koneksi.php");
$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
$nama = $hasil['nama'];

$afi = mysql_query("SELECT * FROM api WHERE username = '$username'");
$api = mysql_fetch_array($afi);
$cekapi = mysql_num_rows($afi);

$harga = '1000';

if($cekapi <> 0) { ?>
<div class="alert alert-danger">
Gagal : User sudah terdaftar dalam sistem api.
</div>
<?php } else  if ($hasil['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<?php } else {
 $key = md5(uniqid(rand(), true));
 $simpan = mysql_query("INSERT INTO api VALUES('', '$key', '$nama', '$username')");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
 if($simpan) { ?>
====================<br />
Nama : <?php echo $nama; ?><br />
Username : <?php echo $username; ?><br />
Apikey : <?php echo $key; ?><br />
====================
<?php } else { ?>
ERROR....
<?php   }
   }
} ?>	