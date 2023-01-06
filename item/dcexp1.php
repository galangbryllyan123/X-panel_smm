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
<script language="JavaScript">
function dcexp()
{
fbid=document.myform.fbid;
ukey=document.myform.ukey;
spam=document.myform.spam;

if(fbid.value==""){
alert("Input FaceBook ID");
fbid.focus();
return false;
}
if(ukey.value==""){
alert("Please input ukey_key");
user.focus();
return false;
}
if(spam.value!=131870){
alert("SPAM CODE WRONG");
spam.focus();
return false;
}
return true;
}
</script>
				<div class="panel-heading">
					<span class="panel-title">Dragon City Exp</span>
				</div>
				<div class="panel-body"> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">FBID</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="fbid" id="fbid" placeholder="fbid"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">SessionID</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="ukey" id="ukey" placeholder="ukey"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Spam Code</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="spam" id="spam" placeholder="spam"/>
                                            <p>Spam Code :131870</p>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="mode" name="mode">
<option value="1000000">125M Exp</option>

                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
Setiap Submit Akan DiPotong Saldo 2000 , Agar Tidak Main Harga ^_^
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var ukey = $('#ukey').val();
	var spam = $('#spam').val();
	var mode = $('#mode').val();
	var fbid = $('#fbid').val();
	$.ajax({
		url	: 'item/dcexp().php',
		data	: 'ukey='+ukey+'&spam='+spam+'&mode='+mode+'&fbid='+fbid,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>