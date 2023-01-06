
<div class="row">
                <div class="col-md-12">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        API Dokumentasi
                    </div>
                    <div class="panel-body">
<hr />

            <div class="row">
                	<div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    	<tr>
                                            <td>HTTP METHOD</td>
                                            <td>POST</td>
                                    	</tr>
                                    	<tr>
                                            <td>API URL</td>
                                            <td>http://xf-panel.my.to/api/</td>
                                    	</tr>
                                    	<tr>
                                            <td>RESPONSE</td>
                                            <td>JSON</td>
                                    	</tr>
                                    </tbody>
                                </table>
                            </div>
                	</div>
                	
                	<div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    	<tr>
                                            <td>API KEY ANDA</td>
                                            <td>

Login dahulu!
</td>
                                    	</tr>
                                    	<tr>
                                            <td>DAFTAR LAYANAN</td>
                                            <td><a href="javascript:;" onclick="showpage('home/price.php');" target="blank">DAFTAR HARGA</a></td>
                                    	</tr>
                                    	<tr>
                                            <td>API EXAMPLE</td>
                                            <td><a href="http://cube-asiatools.org/api/sampleapi.php.txt" target="blank">EXAMPLE PHP CODE</a></td>
                                    	</tr>
                                    </tbody>
                                </table>
                            </div>
                	</div>
            </div>
            
            <div class="row">
                	<div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    	<tr>
                                            <td colspan="2"><h4>Method : order</h4></td>
                                    	</tr>
                                    	<tr>
                                            <td><b>Parameter</b></td>
                                            <td><b>Deskripsi</b></td>
                                    	</tr>
                                    	<tr>
                                            <td>api_key</td>
                                            <td>API Key Anda.</td>
                                    	</tr>
                                    	<tr>
                                            <td>method</td>
                                            <td>order</td>
                                    	</tr>
                                    	<tr>
                                            <td>type</td>
                                            <td>ID Layanan (Lihat pada Daftar Layanan).</td>
                                    	</tr>
                                    	<tr>
                                            <td>link</td>
                                            <td>Target orderan.</td>
                                    	</tr>
                                    	<tr>
                                            <td>quantity</td>
                                            <td>Jumlah yang diinginkan.</td>
                                    	</tr>
                                    </tbody>
                                </table>
                            </div>
                	</div>
                	
                	<div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    	<tr>
                                            <td colspan="2"><h4>Contoh Response order</h4></td>
                                    	</tr>
                                    	<tr>
                                            <td><b>Sukses Order</b></td>
                                            <td><b>Gagal Order</b></td>
                                    	</tr>
                                    	<tr>
                                            <td>{"result":"success","order_id":5510}</td>
                                            <td>
                                            {"result":"error","reason":"bad_auth"}<br />
                                            {"result":"error","reason":"bad_type"}<br />
                                            {"result":"error","reason":"bad_data"}<br />
                                            {"result":"error","reason":"bad_quantity"}<br />
                                            {"result":"error","reason":"not_enough_funds"}<br />
                                            {"result":"error","reason":"bad_method"}<br />
                                            {"result":"error","reason":"please_contact_admin"}
                                            </td>
                                    	</tr>
                                    </tbody>
                                </table>
                            </div>
                	</div>
            </div>
            
            <div class="row">
                	<div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    	<tr>
                                            <td colspan="2"><h4>Method : status</h4></td>
                                    	</tr>
                                    	<tr>
                                            <td><b>Parameter</b></td>
                                            <td><b>Deskripsi</b></td>
                                    	</tr>
                                    	<tr>
                                            <td>api_key</td>
                                            <td>API Key Anda.</td>
                                    	</tr>
                                    	<tr>
                                            <td>method</td>
                                            <td>status</td>
                                    	</tr>
                                    	<tr>
                                            <td>oid</td>
                                            <td>Order id yang ingin dicek.</td>
                                    	</tr>
                                    </tbody>
                                </table>
                            </div>
                	</div>
                	
                	<div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    	<tr>
                                            <td colspan="2"><h4>Contoh Response status</h4></td>
                                    	</tr>
                                    	<tr>
                                            <td><b>Sukses Order</b></td>
                                            <td><b>Gagal Order</b></td>
                                    	</tr>
                                    	<tr>
                                            <td>{"result":"success","price":"1100","start_count":"123","status":"success"}</td>
                                            <td>
                                            {"result":"error","reason":"order_not_found"}
                                            </td>
                                    	</tr>
                                    </tbody>
                                </table>
                            </div>
                	</div>
            </div>
            
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>