<?php
//Script by Aqshal

session_start();

if(!isset($_SESSION['username'])) {
header('location:HomePage/'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<div class="main-box clearfix">
<header class="main-box-header clearfix" style="background-color: #337ab7;color: #fff;">
<h2>Tabel Order</h2>
</header>
<div class="main-box-body clearfix">		
</br>
</br>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username/Link</label>
                                            <div class="col-md-9">
											<div class="input-group">
<span class="input-group-addon">LINK/USERNAME</span>
<input class="form-control" name="usrnmlink" id="usrnmlink" placeholder="Masukan Username/Link" type="text">
</div>
                                        </div>          
                                   </div>  
<br />         
<br />
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Layanan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select" id="layanan" name="layanan">
                                                <option> => Silahkan Pilih Layanan <= </option>  
                                                <option value="1">  Instagram Followers</option>
                                                <option value="2">  Instagram Likes</option>
                                                <option value="3">  Facebook Post/Photo Likes</option>
                                                <option value="4">  Facebook Fanspage Like</option>
                                                <option value="5">  Twitter Followers</option>
                                                <option value="6">  SoundCloud Plays</option>
                                                <option value="7">  Youtube Views</option>
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
<pre>
Syarat & Info :
=> Followers Instagram Masukkan Username saja tanpa @. Contoh : aqshall_f
=> Likes Instagram Masukkan link foto instagram, Contoh : https://www.instagram.com/p/xxx
=> Followers Twitter Masukkan Link saja, Contoh : http://twitter.com/username
=> Likes Masukkan Link Status/Photo, Contoh : https://www.facebook.com/dheryganteng4/posts/1234 Photos/Status (harus dibagikan ke Public)
=> Views Masukkan Link video youtube, Contoh : https://www.youtube.com/watch?v=94bGzWyHbu0
=> Plays Masukkan Link SoundCloud
</pre>



                                       </div>
                                        </div>

<script>
function getharga(jumlah){
var namaaplikasi = $("#layanan").val();
 if(namaaplikasi== "1"){
  var hasil = eval(jumlah) * 19;
  $('#harga').val(hasil);
} else if (namaaplikasi== "2"){
  var hasil = eval(jumlah) * 17;
  $('#harga').val(hasil);
} else if (namaaplikasi== "3"){
  var hasil = eval(jumlah) * 20;
  $('#harga').val(hasil);
} else if (namaaplikasi== "4"){
  var hasil = eval(jumlah) * 100;
  $('#harga').val(hasil);
} else if (namaaplikasi== "5"){
  var hasil = eval(jumlah) * 30;
  $('#harga').val(hasil);
} else if (namaaplikasi== "6"){
  var hasil = eval(jumlah) * 20;
  $('#harga').val(hasil);
} else if (namaaplikasi== "7"){
  var hasil = eval(jumlah) * 21;
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
		url	: 'item2/mulaiorder().php',
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