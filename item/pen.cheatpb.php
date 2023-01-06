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
					<span class="panel-title">Perpanjangan Cheat PB</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">HWID</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="email" id="email" placeholder="HWID"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="7 Hari">7 Hari</option>
<option value="14 Hari">14 Hari</option>
<option value="21 Hari">21 Hari</option>
<option value="30 Hari">30 Hari</option>
<option value="60 Hari">60 Hari</option>
<option value="90 Hari">90 Hari</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
- 3 Hari : 8.000 Saldo
- 14 Hari : 20.000 Saldo
- 21 Hari : 35.000 Saldo
- 30 Hari : 50.000 Saldo
- 60 Hari : 100.000 Saldo
- 90 Hari : 130.000 Saldo
Note : Harap Minta Injektor Kepada Admin
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var email = $('#email').val();
	var paket = $('#paket').val();
	$.ajax({
		url	: 'item/pen.cheatpb().php',
		data	: 'email='+email+'&paket='+paket,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>