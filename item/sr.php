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
					<span class="panel-title">Coins Stick Run</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email/Username Facebook</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="email" id="email" placeholder=""/>
                                            </div>
                                        </div> 
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password Facebook</label>
                                            <div class="col-md-9">                                      
                                            <input type="password" class="form-control" name="sandi" id="sandi" placeholder=""/>
                                            </div>
                                        </div>  
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="10000">10.000 Coins</option>
<option value="20000">20.000 Coins</option>
<option value="40000">40.000 Coins</option>
<option value="100000">100.000 Coins</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
*Setiap Pembelian Stick Run Coins Akan Di Potong Saldo .... Menghindari Permainan Harga <br>
10.000 Coins = 8.000 <br>
Berlaku Kelipatan <br>
</div>
<br>
<center>
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var email = $('#email').val();
	var sandi = $('#sandi').val();
	var status = $('#status').val();
	var paket = $('#paket').val();

	$.ajax({
		url	: 'item/()sr.php',
		data	: 'email='+email+'&sandi='+sandi+'&paket='+paket,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>