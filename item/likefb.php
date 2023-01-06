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
					<span class="panel-title">Facebook Post Likes</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Link/Username</label>
                                            <div class="col-md-9">
				            <div class="input-group">        
                                            <input type="text" class="form-control" name="usrnmlink" id="usrnmlink" placeholder="Link/Username"/>
                                            </div>
                                        </div>          
                                   </div>  
<br />         
<br />
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Layanan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select" id="layanan" name="layanan">
                                                <option value="3">Facebook Post Likes (SERVER 1 : Good Quality, Fast, & WorldWide)</option>
                                            </select>
                                        </div>
                                    </div>
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jumlah</label>
                                            <div class="col-md-9">
				            <div class="input-group">        
                                            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" onkeyup="getharga(this.value).value;"/>
                                            </div>
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

<i><pre>
[+] Server 1 :
- 100 Likes : 2700 Saldo
</pre></i>
<i><pre>
NOTE :
- Instant processing (Proses dilakukan secara auto/langsung, tanpa menunggu lama)<br />
- Pastikan status/post Facebook berstatus Public.<br />
- Masukkan Link status/post Facebook. (Contoh : https://www.facebook.com/sebastianwirajaya11/posts/1769078866654512)<br />
- Untuk yang melanggar Peraturan ini, dan mengalami error saat submit, saldo nya tidak akan di Refund.<br /><br />
<i>Terjadi masalah? Harap lapor Admin.<br />
Terimakasih.</i>
</pre></i>
                                </div>



<script>
function getharga(jumlah){
var namaaplikasi = $("#layanan").val();
 if (namaaplikasi== "3"){
  var hasil = eval(jumlah) * 27;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "JanganDipake"){
  var hasil = eval(jumlah) * 99;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "JanganDipake"){
  var hasil = eval(jumlah) * 99;
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
		url	: 'item/likefb().php',
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