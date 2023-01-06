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

				<div class="panel-heading">
					<span class="panel-title">Social Empires All Resources</span>
				</div>
				<div class="panel-body"> 

                                        <label>FBID</label><br>
		<span class="field"><input type="text" id="fbid" value=""name="fbid" class="input-large" placeholder="Input FB ID"></span>
	<p>
<label>Session ID</label><br>
		<span class="field"><input type="text" id="ukey" value="" name="ukey" class="input-large" placeholder="Input User_key"></span>
<br />         
<br />
                                        <label>Cash</label><br>
		<span class="field"><input type="text" id="cash" value=""name="cash" class="input-large" placeholder="cash"></span>
	<p>
<label>Gold</label><br>
		<span class="field"><input type="text" id="gold" value="" name="gold" class="input-large" placeholder="Gold"></span>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
- Cash : TIDAK DIPUNGUT BIAYA
- Gold: TIDAK DIPUNGUT BIAYA
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var fbid = $('#fbid').val();
	var ukey = $('#ukey').val();
	var cash = $('#cash').val();
	var gold = $('#gold').val();
	$.ajax({
		url	: 'item/()se.php',
		data	: 'fbid='+fbid+'&ukey='+ukey+'&cash='+cash+'&gold='+gold,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>