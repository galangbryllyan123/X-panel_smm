<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
?>
				<div class="panel-heading">
					<span class="panel-title">Voucher Lyto</span>
				</div>
				<div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<?php
include_once "../koneksi.php";
$q1 = mysql_query("SELECT * FROM stockcash WHERE jenis = 'Lyto Cash'");
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
Lyto Game
~ 2.500 Lyto Cash = Rp.10.100 
~ 5.500 Lyto Cash = Rp.20.200
~ 10.000 Lyto Cash = Rp.35.300 
~ 20.000 Lyto Cash = Rp.65.500
~ 57.000 Lyto Cash = Rp.170.000
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