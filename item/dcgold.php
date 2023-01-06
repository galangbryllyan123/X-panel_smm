<?php
//Script by Assegar Ade putra

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
				<div class="panel-heading">
					<span class="panel-title">Dragon City Gold</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="usera" id="usera" placeholder="Masukan Email Anda"/>
                                            </div>
                                        </div>           
<br />         
<br>
<div class="form-group">
         <label class="col-md-3 control-label">Password</label>
               <div class="col-md-9">                                      
          <input type="text" class="form-control" name="passworda" id="passworda" placeholder="Masukkan Password Anda"/>
                                            </div>
                                        </div>           
<br />         
<br />
      <div class="form-group">
           <label class="col-md-3 control-label">Paket</label>
         <div class="col-md-9">                                        
 <select class="form-control select" id="packagea" name="packagea">
<option value="300M Gold">100M Gold </option>
<option value="200M Gold">200M Gold </option>
<option value="300M Gold">300M Gold </option>
<option value="400M Gold">400M Gold </option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
Dragon City Gold:
100M Gold = 10.000 Saldo
200M Gold = 20.000 Saldo
300M Gold = 30.000 Saldo
400M Gold = 40.000 Saldo
NB : kenapa harus pake id pw fb kagak pake fbid sessionkey karena sessionkey mudah berganti angka . jadi Tenang akun anda aman 100%

</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var usera = $('#usera').val();
	var passworda = $('#passworda').val();
	var packagea = $('#packagea').val();
	$.ajax({
		url	: 'item/dcgold().php',
		data	: 'usera='+usera+'&passworda='+passworda+'&packagea='+packagea,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>