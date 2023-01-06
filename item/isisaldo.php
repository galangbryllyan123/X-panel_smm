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
<center><font color="red" sixe="3">Code Voucher Saldo :</center><center>
<input style="width: 75px;  padding: 3px; border: solid 1px #c9c9c9;" class="textbox" placeholder='Kode'style="width: 230px;" type='text' name='kode1'> &nbsp; 
<input style="width: 75px;  padding: 3px; border: solid 1px #c9c9c9;" class="textbox" placeholder='Kode'style="width: 230px;" type='text' name='kode2'> &nbsp; 
<input style="width: 75px;  padding: 3px; border: solid 1px #c9c9c9;" placeholder='Kode'style="width: 230px;" class="textbox" type='text' name='kode3'> &nbsp;
<input style="width: 75px;  padding: 3px; border: solid 1px #c9c9c9;" placeholder='Kode'style="width: 230px;" class="textbox" type='text' name='kode4'> &nbsp;
<input style="width: 75px;  padding: 3px; border: solid 1px #c9c9c9;" placeholder='Kode'style="width: 230px;" class="textbox" type='text' name='kode5'><button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 


</form>
<script>
function kirim()
{
post();
	var kode1 = $('#kode1').val();
	var kode2 = $('#kode2').val();
	var kode3 = $('#kode3').val();
	var kode4 = $('#kode4').val();
	var kode5 = $('#kode5').val();
	
	$.ajax({
		url	: 'item/()isisaldo.php',
		data	: 'kode1='+kode1+'&kode2='+kode2+'&kode3='+kode3+'&kode4='+kode4+'&kode5='+kode5,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>