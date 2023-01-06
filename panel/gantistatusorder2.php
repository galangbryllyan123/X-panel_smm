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

<?php
  require_once("../koneksi.php");
  $idord = $_POST['idord'];

 $caridata = mysql_query("SELECT * FROM historyall WHERE no = '$idord'");
 $data = mysql_num_rows($caridata);
 $dapat = mysql_fetch_array($caridata);
 
if ($data == 0) { ?>
<div class="alert alert-danger">
<b>Gagal :</b> Orderan tidak ditemukan.
</div>
<? } else { ?>
<div id="result2"></div>
<div class="alert alert-success">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No Order</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="noord" id="noord" placeholder="No Orderan" value="<?php echo $idord; ?>" disabled/>
                                            </div>
                                        </div>         
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pembeli</label>
                                            <label class="col-md-9 control-label">: <?php echo $dapat['pembeli']; ?></label>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Barang</label>
                                            <label class="col-md-9 control-label">: <?php echo $dapat['barang']; ?></label>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Harga</label>
                                            <label class="col-md-9 control-label">: <?php echo $dapat['harga']; ?></label>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Data</label>
                                            <label class="col-md-9 control-label">: <?php echo $dapat['data']; ?></label>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Order</label>
                                            <label class="col-md-9 control-label">: <?php echo $dapat['tanggal']; ?></label>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status (<?php echo $dapat['status']; ?>)</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="sts" name="sts">
<option value="Success">Success</option>
<option value="Gagal">Gagal</option>
<option value="Belum">Belum</option>
                                                </select>
                                            </div>
                                        </div>
<br />       
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="ganti();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>
<script>
function post2(){
    $('#result2').html('<div class="progress progress-striped active"><div class="progress-bar progress-bar-inverse" style="width: 100%"></div></div>');
    $("input").attr("disabled", "disabled");
    $("select").attr("disabled", "disabled");
    $("button").attr("disabled", "disabled");
    $("textarea").attr("disabled", "disabled");
}
function hasil2(){
    $("input").removeAttr("disabled");
    $("select").removeAttr("disabled");
    $("button").removeAttr("disabled");
    $("textarea").removeAttr("disabled");
}

function ganti()
{
post2();
	var noord = $('#noord').val();
	var sts = $('#sts').val();
	$.ajax({
		url	: 'panel/gantistatusorder().php',
		data	: 'noord='+noord+'&sts='+sts,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil2();
	$("#result2").html(result);
	}
	});
}
</script>
</div>
<? } 
?>