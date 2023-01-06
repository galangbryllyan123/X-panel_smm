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
<div class="main-box clearfix">
<header class="main-box-header clearfix" style="background-color: #337ab7;color: #fff;">
<h2>Followers Twitter</h2>
</header>
<div class="main-box-body clearfix">		
</br>
</br>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">
											<div class="input-group">
<span class="input-group-addon">@</span>
<input class="form-control" name="usrnmlink" id="usrnmlink" placeholder="Masukan Username" type="text">
</div>
                                        </div>          
                                   </div>  
<br />         
<br />
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Layanan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select" id="layanan" name="layanan">
                                                <option value="110">  Follower Twitter  ( MAX 4K )</option>

                                          </select>
                                        </div>
                                    </div>
<br />         
<br />
                     

					 <div class="form-group">
                                            <label class="col-md-3 control-label">Jumlah</label>
                                            <div class="col-md-9">     
                                            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" onkeyup="getharga(this.value).value;">
                                        </div>          
                                   </div>  
<br />         
<br />
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Harga</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" disabled>
                                            </div>
                                        </div>
                                    </div>
<br />         
<br />
                                        <div data-toggle="modal" data-target="#zonk" class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>



Peraturan :<br />
<br>
- Minimal Order 100 , Jika Dibawah Dari Minim Maka Akunnya Akan Dibannad Secara Permanen <br />
<br>
- Instant processing (Proses dilakukan secara auto/langsung, tanpa menunggu lama)<br />
<br>
- Pastikan Memasukan Data Dengan benar <br /> 
<br>
- Untuk yang melanggar Peraturan ini, dan mengalami error saat submit, saldo nya tidak akan di Refund.<br /> 


                                       </div>
                                        </div>

<script>
function getharga(jumlah){
var namaaplikasi = $("#layanan").val();
 if(namaaplikasi== "110"){
  var hasil = eval(jumlah) * 19;
  $('#harga').val(hasil);

 } 
} 

function kirim()
{
post();
	var usrnmlink = $('#usrnmlink').val();
	var layanan = $('#layanan').val();
	var jumlah = $('#jumlah').val();
	var harga = $('#harga').val();
	$.ajax({
		url	: 'item2/twitter().php',
		data	: 'usrnmlink='+usrnmlink+'&layanan='+layanan+'&jumlah='+jumlah+'&harga='+harga,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>