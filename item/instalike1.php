
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-12" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                            <span class="hidden-xs">Information</span>
                                        </a>
                                    </li>
                                    <li class="tab">
                                        <a href="#profile-12" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                                            <span class="hidden-xs">Instagram Like</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-12">
                                        <p><div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Indoformasi Harga</b></h4>
                                    <p class="text-muted font-13 m-b-25">
           <strong> Pastikan Memasukan Data Dengan benar</strong>
                                    </p>


                                    <table class="table table-striped m-0">
                                        <thead>
                                                                                       <tr>
                                                <th>Server</th>
                                                <th>Min</th>
                                                <th>Max</th>
                                                <th>Harga /100</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Instagram Like Server 1</th>
                                                <th>50 </th>
                                                <th>20000</th>
                                                <th>Rp. 1.300</th>
                                            </tr>
                                        </tbody>
                                    </table>

								</div></p>
                                    </div>
                                    <div class="tab-pane" id="profile-12">
                                        <p>
 <div class="form-group">
	                                                <label for="link">LInk</label>
	                                                <input type="link" class="form-control" id="link" placeholder="Masukan Link">
	                                            </div>
	                                            <div class="form-group">
	                                                <label for="layanan">layanan</label>
	                                                    <select class="form-control" id="service">
 <option value="5">Instagram Like V1 ( Max 20K) </option></option>
	                                                    </select>
	                                            </div>
 <div class="form-group">
	                                                <label for="jumlah">Jumlah</label>
	                                                <input type="number" id="jumlah" class="form-control" placeholder="Masukan Jumlah" onkeyup="kalkulatorTambah(this.value).value;">
	                                            </div>
 <div class="form-group">
	                                                <label>harga</label>
<input type="text" id="harga" class="form-control" readonly="" value="Harga">

	                                            </div>


	                                            <button type="submit" onclick="kirim();" class="btn btn-purple waves-effect waves-light">Submit</button>
</p>
                                    </div>
                                </div>
<script>  
 function reset() {
form.Followers.value="";
form.Like.value="";
form.jumlah.value = "";
}
function kalkulatorTambah(jumlah){
var namaaplikasi = $("#service").val();
if (namaaplikasi== "5"){
var hasil = eval(jumlah) * 13;  
  $('#harga').val(hasil);
} else if (namaaplikasi== "5000000000"){
var hasil = eval(jumlah) * 9999999999;  
  $('#harga').val(hasil);
}

} 
</script>
<script>
function kirim()
{
post();
	var usrnmlink = $('#usrnmlink').val();
	var layanan = $('#layanan').val();
	var jumlah = $('#jumlah').val();
	var harga = $('#harga').val();
	$.ajax({
		url	: 'item/instalike1().php',
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