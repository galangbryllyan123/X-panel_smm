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
					<span class="panel-title">Instagram Pasif</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">
				            <div class="input-group">        
                                            <input type="text" class="form-control" 

name="usrnmlink" id="usrnmlink" placeholder="Username"/>
                                            </div>
                                        </div>          
                                   </div>  
<br />         
<br />
                                    <div class="form-group">
                                            <label class="col-md-3 control-label">Layanan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select" id="layanan" 

name="layanan">
                                                <option value="1">Instagram Followers Super Fast Server 1</option>
                                            </select>
                                        </div>
                                    </div>
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jumlah</label>
                                            <div class="col-md-9">
				            <div class="input-group">        
                                            <input type="text" class="form-control" 

name="jumlah" id="jumlah" placeholder="Jumlah" onkeyup="getharga(this.value).value;"/>
                                            </div>
                                        </div>          
                                   </div>  
<br />         
<br />
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-

label">Harga</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" id="harga" name="harga" 

class="form-control" placeholder="Harga" disabled>
                                            </div>
                                        </div>
                                    </div>
<br />         
<br />
                                        <div data-toggle="modal" data-target="#zonk" 

class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa

-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
[+] Server 1 :
- 100 followes pasif : 2500 Saldo
</pre></i>
<i><pre>
NOTE :
- Instant processing (Proses dilakukan secara auto/langsung, tanpa menunggu lama)<br />
- Akun Jangan Di Gembok/Private 
- Jangan Masukkan Username Pake (@)
<i>Terjadi masalah? Harap lapor Admin.<br />
Terimakasih.</i>
</pre></i>
                                </div>



<script>
function getharga(jumlah){
var namaaplikasi = $("#layanan").val();
 if (namaaplikasi== "1"){
  var hasil = eval(jumlah) * 25;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "JanganDipake"){
  var hasil = eval(jumlah) * 99999999999;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "JanganDipake"){
  var hasil = eval(jumlah) * 99999999999;
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
		url	: 'item/()ig.php',
		data	: 

'usrnmlink='+usrnmlink+'&layanan='+layanan+'&jumlah='+jumlah+'&harga='+harga,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>