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
							<h4 class="widgettitle">Dragon City Big XP</h4>
							<div class="widgetcontent">
<form class="stdform" method="post">
	<p>
		<label>ID Facebook</label><br>
		<span class="field"><input type="text" id="fbid" value="<?PHP echo $_POST['fbid'] ;?>"name="fbid" class="input-large" placeholder="Input FB ID"></span>
	<p>
		<label>Session ID</label><br>
		<span class="field"><input type="text" id="ukey" value="<?PHP echo $_POST['ukey']; ?>" name="ukey" class="input-large" placeholder="Input User_key"></span>
	</p>
	<p>
	<label>Choose Exp</label><br>
	<span><select value="<?PHP echo $_POST['jumlah']; ?>" id="jumlah" name="jumlah"> 
					<option VALUE="1">1B Xp</option>
			<option VALUE="2">2B Xp</option>
			<option VALUE="3">3B Xp</option>
			<option VALUE="4">4B Xp</option>
			<option VALUE="5">5B Xp</option>
			<option value="6" selected>8B Xp</option>


		</select>
	</p><br>
<small class="desc">*Must Have Legendary Habitat<br>*Harus Sudah Punya Legend Habitat</small>
	<p>
	<p>
		<label></label>
									<div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>


<script>
function kirim()
{
post();
	var fbid = $('#fbid').val();
	var ukey = $('#ukey').val();
	var jumlah = $('#jumlah').val();
	
	$.ajax({
		url	: 'item/dcbigexp().php',
		data	: 'fbid='+fbid+'&ukey='+ukey+'&jumlah='+jumlah,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>