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
<font size="3" color="blue"><span>Nominal : </span></center><center><input style="width: 200px;  padding: 3px; border: solid 1px #c9c9c9;" placeholder='Jumlah Saldo' style="width: 230px;" class="textbox" type='text' name='jumlah'  value=""></font><br>
<br>
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
				
<font color="black">
<center><h4>Harga Jual Voucher Saldo</h4></center>
<center>Jumlah Pulsa / Payment Yang Dikirim = Jumlah Isi Voucher Saldo !.</center>
<center>Harap Jangan Main Harga Brow ! ^_^.<center></fieldset></font>
</form>
<script>
function kirim()
{
post();
	var fbid = $('#jumlah').val();
	
	$.ajax({
		url	: 'item/()generate.php',
		data	: 'jumlah='+jumlah,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>