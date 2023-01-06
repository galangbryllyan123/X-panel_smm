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
<!DOCTYPE html>
<html>
<head>
    <title>Dragon City Exp 260M!!</title>
<link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div class="body">

<div class="form-horizontal" role="form" style="width: 50%; padding: 20px; margin: 0px auto">
    <div class="form-group">


<script language="JavaScript">
function checkinput()
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
if(spam.value!=276232){
alert("WRONG SPAM CODE");
spam.focus();
return false;
}
return true;
}
</script><font color= RED>
<link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet" />




<form name="myform" method="post" onsubmit="return dcexpn();">
<p>
		<label>FBID</label><br>
		<span class="field"><input type="text" id="fbid" value="<?PHP echo $_POST['fbid'] ;?>"name="fbid" class="input-large" placeholder="Input FB ID"></span>
	<p>
<label>Session ID</label><br>
		<span class="field"><input type="text" id="ukey" value="<?PHP echo $_POST['ukey']; ?>" name="ukey" class="input-large" placeholder="Input User_key"></span>
</br>
SPAM CODE</br>
<input name="spam" value="" /></br>
</br>SPAM CODE : 276232<br/>
Check SPAM CODE before submit</br>
<label>Choose Exp</label><br>
	<span><select value="<?PHP echo $_POST['jumlah']; ?>" id="jumlah" name="jumlah"> 
					
			<option VALUE="1000000">260M</option>
			
			

                                        </select>
	</p><br>

	<p>
	<p>
		<label></label>
									<div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>
<i><pre>
Setiap Submit Akan DiPotong Saldo 3000 , Agar Tidak Main Harga ^_^
</pre></i>
                                </div>

<script>
function kirim()
{
post();
	var fbid = $('#fbid').val();
	var ukey = $('#ukey').val();
	
	$.ajax({
		url	: 'item/dcexpn().php',
		data	: 'fbid='+fbid+'&ukey='+ukey,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>