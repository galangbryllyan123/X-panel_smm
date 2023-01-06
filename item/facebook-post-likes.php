                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="ion-social-facebook-outline"></i> Facebook Post Likes</h3>
                            </div>
                            <div class="panel-body">
                                <div class="alert alert-info fade in">
                                    <h4>INFO :</h4>
                                    <p>
- Instant processing (Proses dilakukan secara auto/langsung, tanpa menunggu lama)<br />
- Pastikan status/post Facebook berstatus Public.<br />
<font color="white"><b>- Contoh Link Status : https://www.facebook.com/Aditya.MZ.14/posts/1518595931777215</font></b><br />
<font color="white"><b>- Contoh Link Photo : https://www.facebook.com/photo.php?fbid=1518538645116277</font></b><br />
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
                                                    <td>Facebook photo/post likes (INSTANT SERVER 1,Max 5k)</td>
                                                    <td>Rp 2.500</td>
                                                    <td>100</td>
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
                                                <option value="1">Facebook photo/post likes (INSTANT SERVER 1,Max 5k)</option>
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
  var hasil = eval(jumlah) * 25;
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
		url	: 'item/()facebookpost.php',
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