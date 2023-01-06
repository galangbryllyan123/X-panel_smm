				<div class="panel-heading">
					<span class="panel-title">Dragon City Gold</span>
				</div>
				<div class="panel-body"> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">FBID</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="fbid" id="fbid" placeholder="FBID"/>
                                            </div>
                                        </div>           
<br /> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User Key</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="ukey" id="ukey" placeholder="User Key"/>
                                            </div>
                                        </div>           
<br /> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Protect Code</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="spam" id="spam" value="V-Panel"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Package</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="100">30 M Gold</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>
                                </div>
</form>

<div class="alert alert-info">
Jangan Ganti Protect Code<br>
DCGOLD = Rp 500,00
</div>
<script>
function kirim()
{
post();
	var fbid = $('#fbid').val();
	var ukey = $('#ukey').val();
	var spam = $('#spam').val();
	var paket = $('#paket').val();

	$.ajax({
		url	: 'item2/()dcgold.php',
		data	: 'fbid='+fbid+'&ukey='+ukey+'&spam='+spam+'&paket='+paket,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>