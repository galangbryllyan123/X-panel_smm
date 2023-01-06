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
							<h4 class="widgettitle">Dragon City Gems</h4>
							<div class="widgetcontent">
<div class="stdform">
<p>
<label>FBID</label>
<span class="field"><input type="text" name="fbid" id="fbid" class="input-large" placeholder="Masukkan FBID"/></span>
	</p>
<p>
<label>User_Key</label>
<span class="field"><input type="text" name="ukey" id="ukey" class="input-large" placeholder="Masukkan User_Key" /></span>
	</p>
                        <p>
                            <label>Paket</label>
                            <span class="field">
                            <select name="jumlah" id="jumlah" class="uniformselect">
										<option value="182">150 + 30 Gems + 3M Gold</option>
										<option value="364">300 + 60 Gems + 6M Gold</option>
										<option value="546">450 + 90 Gems + 9M Gold</option>
										<option value="728">600 + 120 Gems + 12M Gold</option>
										<option value="1274">1050 + 210 Gems + 21M Gold</option>

</select>
<i>	

<pre>
*Note : Setiap Pengisian gems akan dipotong saldo... menghindari permainan harga
150 Gems = 2.500 Saldo
300 Gems = 5.000 Saldo
450 Gems = 7.500 Saldo
600 Gems = 10.000 Saldo
1050 Gems = 17.500 Saldo
</pre>
								</i>
</span>
</p>
									<p>
									<label></label>
									<span class="field">
									<div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 										<button type="reset" class="btn"><i class="iconfa-refresh iconfa-black"></i> Reset</button>
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
	var paket = $('#paket').val();

	$.ajax({
		url	: 'item/()dcgems.php',
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