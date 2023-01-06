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
<div class="widget">
							<h4 class="widgettitle">Social Wars Reset</h4>
							<div class="widgetcontent">
<div class="stdform">
<p>
<label>FBID</label>
<span class="field"><input type="text" name="fbid" id=fbid" class="input-large" placeholder="Masukkan FBID" value=""/></span>
	</p>
<p>
<label>User_Key</label>
<span class="field"><input type="text" name="ukey" id="ukey class="input-large" placeholder="Masukkan User_Key" value=""/></span>
	</p>
									<p>
									<label></label>
									<span class="field">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
										<button type="reset" class="btn"><i class="iconfa-refresh iconfa-black"></i> Reset</button>
									</span>
									</p>
</div></div>
</div>
<script>
function kirim()
{
post();
	var fbid = $('#fbid').val();
	var ukey = $('#ukey').val();
	$.ajax({
		url	: 'item/()swreset.php',
		data	: 'fbid='+fbid+'&ukey='+ukey,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>