<?php
session_start();
include "../koneksi.php";
if($_SESSION['username'] == '') {
header('location:/?pesan=Mohon masuk dahulu!');
} else {
$username = $_SESSION['username'];
}
$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
$nama = $hasil['nama'];
$afi = mysql_query("SELECT * FROM api WHERE username = '$username'");
$api = mysql_fetch_array($afi);
$cekapi = mysql_num_rows($afi);
if($cekapi == '0') { ?>                                    
                                        <div class="panel-heading">
                                            <h3 class="panel-title">CREATE APIKEY</h3>
                                        </div>
                                        <div class="panel-body">
                                        <b>Biaya Pembuatan ApiKey sebesar : Rp.1.000.- Saldo.</b> 
                                        <button type="submit" id="create" onclick="create();" class="btn btn-danger">CREATE</button>
                                        </div>
                                        </div>
<script>
function create()
{
post();
	var create = $('#create').val();
	$.ajax({
		url	: 'api/create.php',
		data	: 'create='+create,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script><?php } else if($cekapi <> 0) { ?>                      
                                        <div class="panel-heading">
                                            <h3 class="panel-title">API Info</h3>
                                        </div>
                                        <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">ApiKey</label>
                                    <div class="col-md-8">
                                        <input readonly class="form-control" value="<?php echo $api['apikey']; ?>"><br />
                                    </div>
                                        </div>
                                        </div>
                                        <div class="panel-heading">
                                            <h3 class="panel-title">SOCIAL MEDIA API</h3>
                                        </div>
                                        <div class="panel-body">
<font color="black"><</font><font color="black">?php<br />
$apikey = 'APIKEY XF - PANEL ANDA'; // apikey akun XF - PANEL<br />
$target = 'mutiara'; // username atau link target<br />
$id = '1'; // id dapat dilihat pada daftar harga<br />
$jumlah = '100'; // jumlah yang ingin dimasukan<br />
<br />
$ch = curl_init();<br />
curl_setopt($ch, CURLOPT_URL,"http://xf-panel.my.to/api/proses.php");<br />
curl_setopt($ch, CURLOPT_POST, 1);<br />
curl_setopt($ch, CURLOPT_POSTFIELDS,<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"apikey=$apikey&target=$target&id=$id&jumlah=$jumlah");<br />
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);<br />
$ret = curl_exec ($ch);<br />
curl_close ($ch);<br />
$result = json_decode($ret,true);<br />
if($result['result'] == 'true'){<br />
echo $result;<br />
} else {<br />
echo $result['msg']; // result jika gagal<br />
} ?</font><font color="black">></font><br />
                                        </div>
                                        </div>
                                        </div>
                                        <div class="panel-heading">
                                            <h3 class="panel-title">RESET APIKEY</h3>
                                        </div>
                                        <div class="panel-body">
                                        <b>Biaya reset ApiKey sebesar : Rp.500,00.- Saldo.</b> 
                                        <button type="submit" id="create" onclick="reset();" class="btn btn-danger">RESET</button>
                                        </div>
                                        </div>
<script>
function reset()
{
post();
	var reset = $('#reset').val();
	$.ajax({
		url	: 'api/reset.php',
		data	: 'reset='+reset,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script><?php } ?>