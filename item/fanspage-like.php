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
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="ion-social-facebook-outline"></i> Facebook Fanspage Likes</h3>
                            </div>
                            <div class="panel-body">
<h3><center><b><font color="white">MASUKAN LINK FANSPAGE</center></b></font></h3>
                                <div class="alert alert-info fade in">
                                    <h4>INFO :</h4>
                                    <p>
- Instant processing (Proses dilakukan secara auto/langsung, tanpa menunggu lama)<br />
- <font color="white"><b>- Contoh Link Status : https://www.facebook.com/svpanel/</font></b><br />
- Untuk yang melanggar Peraturan ini, dan mengalami error saat submit, saldo nya tidak akan di Refund.<br /><br />
<i>Terjadi masalah? Harap lapor Admin.<br />
Terimakasih.</i>
                                    </p>
                                </div>

                                <div class="alert alert-success fade in">
                                    <h4>HARGA :</h4>
                                    <p>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Layanan</th>
                                                    <th>Harga/100</th>
                                                    <th>Min. Order</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Fanspage Like Server 1</td>
                                                    <td>Rp 8.500</td>
                                                    <td>250</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Username/Link</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="usrnmlink" name="usrnmlink" placeholder="Username/Link">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Layanan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="layanan" name="layanan">
                                                <option value="1">Fanspage Like Server 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Jumlah</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" onkeyup="getharga(this.value).value;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Harga</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-3 col-sm-9">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<script>
function getharga(jumlah){
var namaaplikasi = $("#layanan").val();
 if (namaaplikasi== "1"){
  var hasil = eval(jumlah) * 85;
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
		url	: 'item/()facebookfans.php',
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