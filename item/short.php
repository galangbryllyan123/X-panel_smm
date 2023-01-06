				<div class="panel-heading">
					<span class="panel-title">URL Shortener 3 Server</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Link/URL</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="url" id="url" placeholder="http://linkataurlnya.kamu/"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="type" name="type">
<option value="1">Coin URL</option>
<option value="2">Adf.ly</option>
<option value="3">Bit.ly</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div data-toggle="modal" data-target="#zonk" class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
Gratis Tidak Di Pungut Biaya
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var url = $('#url').val();
	var type = $('#type').val();
	$.ajax({
		url	: 'item/short().php',
		data	: 'url='+url+'&type='+type,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>