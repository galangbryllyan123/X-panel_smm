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
					<span class="panel-title">ALL SOCIAL MEDIA</span>
				</div>
				<div class="panel-body"> 

		<ul class="nav nav-tabs">
			<li class="active"><a href="#info" data-toggle="tab"><i class="fa fa-info"></i> Informasi</a></li>
			<li><a href="#form" data-toggle="tab"><i class="fa fa-shopping-cart"></i> Mulai Order</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="info">
<div class="panel panel-danger">
                                    <h4>Informasi</h4>
                                    <p>
<b>PERATURAN :</b><br />
- Jika terjadi kesalahan/error pada order karena user tidak memasukkan yang data sesuai dengan informasi, Admin tidak akan memberikan Refund.<br />
- Harga Akan Muncul Jika Anda Memasukkan Jumlah.

                                    </p>
                                </div>

                                <div class="panel panel-info">
                                    <h4>CARA MEMBUAT ORDER BARU.</h4>
                                    <p>
<b>INSTAGRAM :</b><br />

CARA MEMBUAT ORDER BARU.

INSTAGRAM :
- Pastikan akun Instagram publik/tidak private.<br />
- Untuk Instagram Followers masukkan username Instagram, contoh : "grashelliniv" (Tanpa tanda petik). (Kecuali terdapat info lain pada nama layanan)<br />
- Untuk Instagram Likes masukkan url/link foto Instagram, contoh : "https://www.instagram.com/p/BBxQUQkOVou/" (Tanpa tanda petik).<br />

FACEBOOK :</b><br />
- Pastikan akun/post/foto Facebook publik/tidak private.<br />
- Untuk Facebook Followers masukkan url/link akun Facebook, contoh : "https://www.facebook.com/dcqwe1/" (Tanpa tanda petik).<br />
- Untuk Facebook Post/Photo Likes masukkan url/link post Facebook, contoh : "https://www.facebook.com/dcqwe1/posts/1778401315722267" untuk post dan "https://www.facebook.com/photo.php?fbid=1670384563190610" untuk foto (Tanpa tanda petik).<br />

TWITTER :</b><br />
- Pastikan akun/tweet Twitter publik/tidak private.<br />
- Untuk Twitter Followers masukkan url/link akun Twitter, contoh : "https://www.twitter.com/A7Denny" (Tanpa tanda petik).<br />


YOUTUBE :</b><br />
- Untuk Youtube Views masukkan url/link video Youtube, contoh : "https://www.youtube.com/watch?v=5wrfguOKlac" (Tanpa tanda petik).<br />

SOUNDCLOUD :</b><br />
- Untuk Soundclouds Plays masukkan url/link soundcloud.


                                    </p>
                                </div>

			</div>
			
			<div class="tab-pane" id="form">
<p><div class="form-group"><div class="label label-danger in">
Beri Waktu Jeda 20 Menit Bila Submit Username/URL Yang Sama
</div></div></p>
                                <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Link/Username</label>
                                            <div class="col-md-9">
				            <div class="input-group">        
                                            <span class="input-group-addon">@</span>                              
                                            <input type="text" class="form-control" name="link" id="link" placeholder="Link/Username"/>
                                            </div>
                                        </div>          
                                   </div>  
<br />         
<br />
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Layanan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select" id="kode" name="kode">
                                            <option value="1">Instagram Followers Super Fast Server 1</option>
                                            <option value="2">Instagram Followers HQ Fast Server 2</option>
                                            <option value="3">Instagram Followers HQ Fast Server 3</option>
                                            <option value="5">Instagram Likes Super Fast</option>
                                            <option value="6">Twitter Followers Instant</option>
                                            <option value="7">Twitter Retweets Instant</option>
                                            <option value="8">Twitter Favorites Instant</option>
                                            <option value="9">Youtube Views Super Fast</option>
                                            <option value="10">Facebook Fanspage Likes Start 24jam</option>
                                            <option value="11">Soundcloud Plays Fast</option>
                                            <option value="12">Facebook Photo/Post Likes Fast</option>
                                            <option value="13">Vine Followers</option>
                                            <option value="14">Vine Likes</option>
                                            <option value="15">Vine Revines</option>
                                            <option value="16">Vine Loops </option>
                                            <option value="19">Website Traffic Fast </option>
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
<button class="btn btn-info" id="btnLogin" onclick="kirim();" ><i class="fa fa-shopping-cart" name="proces" type="submit"></i> Buy</button> 
                                        </div>


<script>
function getharga(jumlah){
var namaaplikasi = $("#kode").val();
 if (namaaplikasi== "1"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
} else if (namaaplikasi== "2"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
} else if (namaaplikasi== "3"){
  var hasil = eval(jumlah) * 20;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "5"){
  var hasil = eval(jumlah) * 15;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "6"){
  var hasil = eval(jumlah) * 20;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "7"){
  var hasil = eval(jumlah) * 22;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "8"){
  var hasil = eval(jumlah) * 23;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "9"){
  var hasil = eval(jumlah) * 14;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "10"){
  var hasil = eval(jumlah) * 93;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "11"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "12"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "13"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "14"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "15"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "16"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
 } else if (namaaplikasi== "19"){
  var hasil = eval(jumlah) * 18;
  $('#harga').val(hasil);
 }
} 

function kirim()
{
post();
	var link = $('#link').val();
	var kode = $('#kode').val();
	var jumlah = $('#jumlah').val();
	$.ajax({
		url	: 'item2/ini().php',
		data	: 'link='+link+'&kode='+kode+'&jumlah='+jumlah,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>