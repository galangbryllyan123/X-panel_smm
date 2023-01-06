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
					<span class="panel-title">Pembuatan Blogger</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Domain</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="doimian" id="doimian" placeholder="http://namadomain.blogspot.com/"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="emaile" id="emaile" placeholder="Masukkan Email Anda"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="passworde" id="passworde" placeholder="Masukkan Password Anda"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="Biasa">Template Biasa</option>
<option value="Standart">Template Standart</option>
<option value="Keren">Template Keren</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
Pembuatan Blogger :
Template Biasa : Rp.10.000 Saldo
Template Standart : Rp.30.000 Saldo
Template Keren : Rp.50.000 Saldo
Note Harap Masukkan Link FB Dengan Benar , Karena Apabila Ada Kesulitan Admin Bisa Menghubungi Anda

</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var emaile = $('#emaile').val();
	var passworde = $('#passworde').val();
	var paket = $('#paket').val();
	var doimian = $('#doimian').val();
	$.ajax({
		url	: 'item/()blog.php',
		data	: 'emaile='+emaile+'&passworde='+passworde+'&paket='+paket+'&doimian='+doimian,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>