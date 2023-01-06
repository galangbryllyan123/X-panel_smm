<?php
//Script By Aqshal

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); 
}
else {
  $usr = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$usr'");
$get = mysql_fetch_array($query);
?>
				<div class="panel-heading">
					<span class="panel-title">Tukar Point Saldo</span>
				</div>
				<div class="panel-body"> 
                                        <div class="form-group">
						<label>Sisa Poin anda :</label><br/>
		<input class="form-control" value="<?php echo $get['poin']; ?>" readonly="" disabled=""/><br/>
        <label>Jumlah Poin yang di ingin ditukar :</label><br/>
	<span class="field">
	<select id="jumlah" name="jumlah" onchange="total1();" class="form-control input-sm">
                                 <option>=> Pilih total poin yang ingin anda tukar <=</option>
                                 <option value="1">50 Poin</option>
                                 <option value="2">100 Poin</option>
                                 <option value="3">500 Poin</option>
                                 <option value="4">1000 Poin</option>
<select>
</span>
</br>
	<label>Total saldo yang didapatkan :</label><br/>
		<input id="total" name="total" class="form-control" disabled="" placeholder="Total saldo yang anda dapatkan"/>

                                        </div>    </br>
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="tukar();" ><i class="fa fa-mail-forward" name="submit" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
*) Jika Point 0, tingkatkan terus transaksi anda !!
</pre></i>
                                </div>

<script>
function total1(){
		var jumlah = document.getElementById('jumlah').value;
		var total = document.getElementById('total').value;
		if(jumlah== 1){
			var total = "1000";
		} else if(jumlah == 2){
			var total = "2000";
		} else if(jumlah == 3){
			var total = "10000";
		} else if(jumlah == 4){
			var total = "20000";
		} else if(jumlah == 0){
			var total = "0";
		}
document.getElementById('total').value = total;
}

function tukar()
{
post();
	var jumlah = $('#jumlah').val();
	var total = $('#total').val();
	$.ajax({
		url	: 'panel/tukarpoint().php',
		data	: 'jumlah='+jumlah+'&total='+total,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>