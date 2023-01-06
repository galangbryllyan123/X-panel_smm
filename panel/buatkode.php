<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }

?>
				<div class="panel-heading">
					<span class="panel-title">Tambah Kode Voucher Top UP</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Masukan Kode</label>
											
	                                        <input name="id" type="hidden" id="id" value="<?php echo $username; ?>">
                                            <div class="col-md-9">  
<div class="pull-left">											
                                            <input type="text" class="form-control" placeholder="GVPANEL"  style="width: 60%;" disabled>  </div>
											<input type="text" class="form-control" name="kode"  id="kode" placeholder="Masukan 5digit Kode Voucher Anda" style="width: 60%;"/>    </br>                                          
											<select class="form-control select" id="nominal" name="nominal">
<option value="5000">Rp. 5.000,- Saldo</option>
<option value="10000">Rp. 10.000,- Saldo</option>
<option value="15000">Rp. 15.000,- Saldo</option>
<option value="20000">Rp. 20.000,- Saldo</option>
<option value="25000">Rp. 25.000,- Saldo</option>
<option value="50000">Rp. 50.000,- Saldo</option>
                                                </select>
                                            </div>
											
                                        </div>    </br>
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="submit" type="submit"></i> Submit</button> 
                                        </div>


                                </div>

<script>
function kirim()
{
post();
	var nominal = $('#nominal').val();
	var kode = $('#kode').val();
	$.ajax({
		url	: 'panel/prosestambahkode.php',
		data	: 'nominal='+nominal+'&kode='+kode,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>