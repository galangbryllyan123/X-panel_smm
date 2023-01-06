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
    <title>Dragon City Gold!!</title>
<link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div class="body">

<div class="form-horizontal" role="form" style="width: 50%; padding: 20px; margin: 0px auto">
    <div class="form-group">


<script language="JavaScript">
function dcgold1()
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
</script><font color= Blue>
<link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet" />



<form name="myform" method="post" onsubmit="return dcgold1();">
<p>
		<label>FBID</label><br>
		<span class="field"><input type="text" id="fbid" value="<?PHP echo $_POST['fbid'] ;?>"name="fbid" class="input-large" placeholder="Input FB ID"></span>
	<p>
<label>Session ID</label><br>
		<span class="field"><input type="text" id="ukey" value="<?PHP echo $_POST['ukey']; ?>" name="ukey" class="input-large" placeholder="Input User_key"></span>
</br>
SPAM CODE</br>
<input name="spam" value="" /></br>
</br>SPAM CODE : 131870<br/>
Check SPAM CODE before submit</br>
<label>Choose Exp</label><br>
	<span><select value="<?PHP echo $_POST['jumlah']; ?>" id="jumlah" name="jumlah"> 
					<option VALUE="10">10M</option>
			<option VALUE="20">20M</option>
			<option VALUE="30">30M </option>
			

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
		url	: 'item/dcgold1().php',
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