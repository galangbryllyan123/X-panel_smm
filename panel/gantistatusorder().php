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
  $noord = $_POST['noord'];
  $status = $_POST['sts'];

 $caridata = mysql_query("SELECT * FROM historyall WHERE no = '$noord'");
 $data = mysql_num_rows($caridata);
 $dapat = mysql_fetch_array($caridata);
 
if ($data == 0) { ?>
<div class="alert alert-danger">
<b>Gagal :</b> Orderan tidak ditemukan.
</div>
<? } else 
 $simpan = mysql_query("UPDATE historyall SET status = '$status' WHERE no = '$noord'");
 if($simpan) { ?>
<div class="alert alert-success"><center>
Status orderan berhasil diganti!<br />
Sebelum : <?php echo $dapat['status']; ?><br />
Sesudah : <?php echo $status; ?><br />
Silahkan cek orderan.
</center></div>
<? } 
?>