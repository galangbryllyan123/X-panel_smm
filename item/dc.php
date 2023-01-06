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
					<span class="panel-title text-semibold">Gold</span>
				</div>
				<div class="panel-body"> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Facebook ID</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="fbid" id="fbid" placeholder="Masukan Facebook ID"/>
                                            </div>
                                        </div> <br /> <br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Userkey</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="ukey" id="ukey" placeholder="Masukan UserKey"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="1">5.000.000 GOLD</option>

                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
*Setiap Pembelian  Akan Di Potong Saldo .... Menghindari Permainan Harga
*5.000.000 GOLD = 3.000
</div>
<br>
<center>
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var fbid = $('#fbid').val();
	var ukey = $('#ukey').val();
	var paket = $('#paket').val();

	$.ajax({
		url	: 'item/()dc.php',
		data	: 'fbid='+fbid+'&ukey='+ukey+'&paket='+paket,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>