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
                                    <h4>Tambah Stock Voucher Game</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
   

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Voucher</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="jenis" name="jenis">
<option value="Gemscool Cash">Gemscool Cash</option>
<option value="SHELL">SHELL</option>
<option value="MI Cash">MI Cash</option>
<option value="Lyto Cash">Lyto Cash</option>
<option value="Digicash">Digicash</option>
                                                </select>
                                            </div>
                                        </div>
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Isi Voucher</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="isi" id="isi" placeholder="Isi Voucher"/>
                                            </div>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Harga</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga"/>
                                            </div>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kode Cash</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="kode" id="kode" placeholder="1234-4321-1234-4321"/>
                                            </div>
                                        </div>           
<br />       
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="tambahstockv();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>
                                </div>

<script>
function tambahstockv()
{
post();
	var jenis = $('#jenis').val();
	var isi = $('#isi').val();
	var harga = $('#harga').val();
	var kode = $('#kode').val();
	$.ajax({
		url	: 'panel/tambahstockv().php',
		data	: 'jenis='+jenis+'&isi='+isi+'&harga='+harga+'&kode='+kode,
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