<?php
// Script by Ichlas Wardy Gustama

session_start();
if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);

$user = mysql_query("SELECT * FROM user");
$transaksi = mysql_query("SELECT * FROM historyall");
$totaluser = mysql_num_rows($user);
$totaltransaksi = mysql_num_rows($transaksi);

$nama = $get['nama'];
$level = $get['level'];
$saldo = "Rp " . number_format($get['saldo'],2,',','.');
$uplink = $get['uplink'];
$password = $get['password'];
$fbid = $get['fbid'];
?>
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Change Password</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body"> 


                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Ussername"/>
                                            </div>
                                        </div>          
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password LAMA</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="passwordlama" id="passwordlama" placeholder="Password Lama"/>
                                            </div>
                                        </div>          
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password BARU</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="passwordbaru" id="passwordbaru" placeholder="Password Baru"/>
                                            </div>
                                        </div>          
<br />
                                        <div data-toggle="modal" data-target="#zonk" class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="cpass();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-warning">
Berhati-hatilah memasukkan data.
</div>
                                </div>

<script>
function cpass()
{
post();
	var username = $('#username').val();
	var passwordlama = $('#passwordlama').val();
	var passwordbaru = $('#passwordbaru').val();
	$.ajax({
		url	: 'panel/cpass().php',
		data	: 'username='+username+'&passwordlama='+passwordlama+'&passwordbaru='+passwordbaru,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>