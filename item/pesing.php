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
					<span class="panel-title">Phising</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Link Facebook</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Contoh : fb.me/arieftamvans"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="coc">Phising COC</option>
<option value="pb">Phising PB</option>
<option value="lgr">Phising LGR</option>
<option value="nh">Phising NH</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
*Setiap Pembelian Web Phising Akan Di Potong Saldo .... Menghindari Permainan Harga <br>
All Phising : 
Phising COC : 12.500<br>
Phising PB  : 15.000<br>
Phising LGR : 12.500<br>
Phising NH  : 13.000<br> 
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
		url	: 'item/()pesing.php',
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