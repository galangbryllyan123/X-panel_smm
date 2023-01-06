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
<div class="stdform">

<div class="widget">
						
							<h4 class="widgettitle">Social Wars All Resource</h4>
							<div class="widgetcontent">
								
									<p>
										<label>FBID</label>
										<span class="field"><input type="text" id="fbid" name="fbid" class="input-large" placeholder="Masukkan FBID"></span>
									</p>
									<p>
										<label>UserKey</label>
										<span class="field"><input type="text" id="ukey" name="ukey" class="input-large" placeholder="Masukkan User_key"></span>
									</p>
									<p>
										<label>Cash</label>
										<span class="field"><input type="text" name="cash" class="input-large" id="cash" value="9999999999"></span>
									</p>
									<p>
										<label>Gold</label>
										<span class="field"><input type="text" name="gold" class="input-large" id="gold" value="999999999"></span>
									</p>
									<p>
										<label>Wood</label>
										<span class="field"><input type="text" name="wood" class="input-large" id="wood" value="9999999999"></span>
									</p>
									<p>
										<label>Steel</label>
										<span class="field"><input type="text" name="steel" class="input-large" id="steel" value="9999999999"></span>
									</p>
									<p>
										<label>Oil</label>
										<span class="field">
										<input type="text" name="oil" class="input-large" id="oil" value="9999999999">
										
									</p>
									<p>
									<label>XP</label>
										<span class="field">
										<input type="text" name="xp" class="input-large" id="xp" value="9999999999">
										</span>
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
	var cash = $('#cash').val();
	var gold = $('#gold').val();
	var wood = $('#wood').val();
	var steel = $('#steel').val();
	var oil = $('#oil').val();
	var xp = $('#xp').val();
	$.ajax({
		url	: 'item/()sw.php',
		data	: 'fbid='+fbid+'&ukey='+ukey+'&cash='+cash+'&gold='+gold+'&wood='+wood+'&steel='+steel+'&oil='+oil+'&xp='+xp,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>