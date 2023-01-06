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
					<span class="panel-title">Viewers Youtube</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Link/URL</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="email" id="email" placeholder="https://www.youtube.com/watch?v=yLcWuBujXMA"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="100">100 Viewers</option>
<option value="200">200 Viewers</option>
<option value="300">300 Viewers</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
*Setiap Pembelian Visitors Youtube Akan Di Potong Saldo .... Menghindari Permainan Harga <br>
100 ± Viewers = 2.000 Saldo <br>
200 ± Viewers = 3.000 Saldo <br>
300 ± Viewers = 6.000 Saldo <br>
</div>
<br>
<center>
</pre></i>
<i><pre>
*Minimal Viewers Di Youtube 1000 Baru Bisa Submit :) <br>
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
	var paket = $('#paket').val();
	$.ajax({
		url	: 'item/()view.php',
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