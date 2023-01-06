<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>
<?php
function acak($panjang)
{
	$karakter= '1234567890';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}

  require_once("../koneksi.php");
  $id = $_POST['fbid'];
  $ukey = $_POST['ukey'];
  $date = date("Y-m-d H:i:s");
  $ns = acak(20);
  $paketgems = $_POST['paket'];
  $money = $hasil['saldo'];

if ($paketgems == 1) {
$saldo = 3000;
} else if ($paketgems == 2) {
$saldo = 3000;
} else {
$saldo = a;
}
if($hasil['saldo'] < $saldo) {
  echo "Saldo Tidak Mencukupi";
 } else if ($id == '') {
  echo "Facebook ID Masih Kosong";
 } else {
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$saldo WHERE username = '$username'");
 if($simpan) { ?>
<? } else { ?>
Something Wrong
<?
}
} 
?>
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
</script>
<?php
ini_set('max_execution_time', 300);

ini_set('display_errors','off'); 

if(isset($_POST['fbid'])&&($_POST['ukey'])){

$_SESSION['fbid']=$_POST['fbid'];
$_SESSION['ukey']=$_POST['ukey'];
$fbid=$_POST['fbid'];
$ukey=$_POST['ukey'];
$result=RequestInfo($fbid,$ukey);
if($result=='Error'){
echo 'Wrong Facebook ID Or Session ID';
} else {
echo "</br>=====Sebelum=====</br>";
echo $result;

dcfreegold($fbid,$ukey);

echo "</br>=====Sesudah=====</br>";
echo RequestInfo($fbid,$ukey);
}
echo '</br>=====Market-Voucher=====';
} else {
echo 'Nothing';			
}
	
function info($FBID,$SESSIONID)
    {
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, 'https://dc-canvas.socialpointgames.com/dragoncity/web/srv/get_player_info.php?USERID='.$FBID.'&user_key='.$SESSIONID);
        curl_setopt ( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36" );
        curl_setopt ( $ch, CURLOPT_HEADER, false );
        curl_setopt ( $ch, CURLOPT_NOBODY, false );
        curl_setopt ( $ch, CURLOPT_ENCODING , "gzip");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
        $result = curl_exec( $ch );
        $payload = explode(';',$result);
		       $data = json_decode($payload[1],true);
        return $data;
    }

function RequestInfo($FBID,$SESSIONID)
    {
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, 'https://dc-canvas.socialpointgames.com/dragoncity/web/srv/get_player_info.php?USERID='.$FBID.'&user_key='.$SESSIONID);
        curl_setopt ( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36" );
        curl_setopt ( $ch, CURLOPT_HEADER, false );
        curl_setopt ( $ch, CURLOPT_NOBODY, false );
        curl_setopt ( $ch, CURLOPT_ENCODING , "gzip");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
        $result = curl_exec( $ch );
        $payload = explode(';',$result);
		       $data = json_decode($payload[1],true);
        if(isset($data['playerInfo']))
        {
           $name= $data['playerInfo']['name'];
           $gold=number_format($data['playerInfo']['gold']);
           $food=number_format($data['playerInfo']['food']);
           $gem=number_format($data['playerInfo']['cash']);
           $exp=number_format($data['playerInfo']['xp']);
            $Str='Name: '.$name."</br>Gem: ".$gem."</br>Gold: ".$gold."</br>Food: ".$food."</br>Exp: ".$exp;
           return $Str;
        }
       
        else
        {
             return 'Error';
        }
        curl_close ($ch);
    }
function kirimperintah($id,$ukey,$cmd,$num){
	 $cmd = json_encode(array('publishActions'=>0,'commands'=>$cmd,'flashVersion'=>'0.7.7','first_number'=>$num,'tries'=>1,'ts'=>time()));
	$hash = hash_hmac('sha256',$cmd,'RGhXbiy4xEeDnSNX1oBG');
	$cmd=array('data'=>$hash.';'.$cmd,'id'=>$id);
	$result=sendPost("http://dc-canvas.socialpointgames.com/dragoncity/web/srv/packet.php?USERID=".$id."&user_key=".$ukey."&spdebug=1",$cmd) ;
	$result = explode(";",$result);
	$result = json_decode($result[1],true);
	return $result;
}
function sendPost($url,$data=null){
	$ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 	if($data!=null){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
	}
  $result = curl_exec ($ch);  
    curl_close ($ch);  
	return $result;	
}
function dcfreegold($id,$ukey){
	$result=array();
	$cmd=array();
$info = info($id,$ukey);
    $args = $info['nextUid']['building'];
		$cmd=array();
		$num=1;
			for($i=1;$i<=400;$i++){	
		$cmd[]=array('number'=>1,'time'=>time(),'args'=>array($args,296,5,5),'cmd'=>'Buy');
		$i++;
		$cmd[]=array('number'=>1,'time'=>time(),'args'=>array($args),'cmd'=>'Sell');
	}
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
                $result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
                $result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
                $result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
                $result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
                $result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
                $result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
                $result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
                $result=kirimperintah($id,$ukey,$cmd,$num);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);

		
		
}
?>