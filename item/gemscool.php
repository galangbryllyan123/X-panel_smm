<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
?>
				<div class="panel-heading">
					<span class="panel-title">Voucher Gemscool</span>
				</div>
				<div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<?php
include_once "../koneksi.php";
$q1 = mysql_query("SELECT * FROM stockcash WHERE jenis = 'Gemscool Cash'");
if(mysql_num_rows($q1) <= 0){
echo "<option value='0'>Maaf, Stock kosong</option>";
}else{
?>
<?php
}
while ($row = mysql_fetch_array($q1)) {
echo "<option value='$row[id]'>$row[isi] $row[jenis]</option>";
}
?>
                                                </select>
                                            </div>
                                        </div>
                              
                                        <div class="form-group"><br /><br />
<button class="btn btn-primary btn-block" id="btnLogin" onclick="cash();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
Gemscool
~ 1.000 G-Cash = Rp.10.000 
~ 2.000 G-Cash = Rp.19.200
~ 3.000 G-Cash = Rp.33.000 
~ 5.000 G-Cash = Rp.55.000
~ 10.000 G-Cash = Rp.110.000
~ 20.000 G-Cash = Rp.220.000
~ 30.000 G-Cash = Rp.330.000
</pre></i>
				</div>

<script>
function cash()
{
post();
	var paket = $('#paket').val();
	$.ajax({
		url	: 'item/cash().php',
		data	: 'paket='+paket, 
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>