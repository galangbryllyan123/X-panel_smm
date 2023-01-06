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
<?php if($get['level'] !== Admin) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Ganti Status Orderan</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No Order</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="idord" id="idord" placeholder="No Orderan"/>
                                            </div>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="cek();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-warning">
Berhati-hatilah memasukkan data.
</div>
                                </div>

<script>
function cek()
{
post();
	var idord = $('#idord').val();
	$.ajax({
		url	: 'panel/gantistatusorder2.php',
		data	: 'idord='+idord,
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