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
<?php if($get['level'] == Member) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Tambah User</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"/>
                                            </div>
                                        </div>           
<br />
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                                            </div>
                                        </div>           
<br />
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Password"/>
                                            </div>
                                        </div>           
<br />
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">FBID</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="FBID Peserta"/>
                                            </div>
                                        </div>           
<br />
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Level</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="level" name="level">
<?php if ($get['level'] == "Reseller") { ?>
<option value="Member">Member</option>
<option value="Agen">Agen</option>

<? } else if ($get['level'] == "Admin") { ?>
<option value="Member">Member</option>
<option value="Agen">Agen</option>
<option value="Reseller">Reseller</option>

<? } else if ($get['level'] == "Agen") { ?>
<option value="Member">Member</option>
<? }
?>
                                                </select>
                                            </div>
                                        </div>
<br />
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="tambahuser();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-info">
Member : Rp 10.000 = 5.000 Saldo<br /> Agen : Rp 30.000 = 15.000 Saldo<br /> Reseller : Rp 100.000 = 50.000 Saldo
</div>
                                </div>

<script>
function tambahuser()
{
post();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var facebook = $('#facebook').val();
	var level = $('#level').val();
	$.ajax({
		url	: 'panel/tambahuser().php',
		data	: 'nama='+nama+'&username='+username+'&password='+password+'&facebook='+facebook+'&level='+level,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>

<? } ?>