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
<?php
function ambilplayerinfo($id,$ukey){
	$result=sendPost("http://dc-canvas.socialpointgames.com/dragoncity/web/srv/get_player_info.php?USERID=".$id."&user_key=".$ukey."&spdebug=1",null);
	$result = explode(";",$result);
	$result = json_decode($result[1],true);
	return $result;
}
function sendPost($url,$data=null){
global $prox;
	$ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//	curl_setopt($ch, CURLOPT_TIMEOUT_MS, 2000);
//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);	
//	curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
 	if($data!=null){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
	}
    $result = curl_exec ($ch);  
    curl_close ($ch);  
	return $result;	
}
function player($data)
{
$pinfo.= 'NAMA : '.$data['playerInfo']['name'].' <br>
';
$pinfo.= 'FBID : '.$data['playerInfo']['pid'].'<br>
';
return $pinfo;
}
function infodcfreegold($data){
	
$dat = 'GEMS : '.number_format($data['playerInfo']['cash'],0,',','.').' <br>
';
$dat .= 'GOLD : '.number_format($data['playerInfo']['gold'],0,',','.').'<br>
';
$dat .= 'FOOD : '.number_format($data['playerInfo']['food'],0,',','.').'<br>
';
$dat .= 'EXP : '.number_format($data['playerInfo']['xp'],0,',','.').'<br>
';
$dat .= 'LEVEL : '.$data['playerInfo']['level'].'<br>
';
return $dat;	
}


function sendPost2(){
global $fbid,$user;
	$ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, "http://dc-canvas.socialpointgames.com/dragoncity/web/srv/get_player_info.php?USERID=$fbid&user_key=$user&language=fr"); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: 127.0.0.1",
	"X-Client-IP: 127.0.0.1",
	"Client-IP: 127.0.0.1",
	"HTTP_X_FORWARDED_FOR: 127.0.0.1",
	"X-Forwarded-For: 127.0.0.1"));
    $result = curl_exec ($ch);  
    curl_close ($ch);  
	$result = explode(";",$result);
	return json_decode($result[1],1);	

}

function kirimperintah($id,$ukey,$cmd,$num){
	$cmd = json_encode(array('publishActions'=>0,'commands'=>$cmd,'flashVersion'=>'0.7.3','first_number'=>$num,'tries'=>1,'ts'=>time()));
	$hash = hash_hmac('sha256',$cmd,'RGhXbiy4xEeDnSNX1oBG');
	$cmd=array('data'=>$hash.';'.$cmd,'id'=>$id);
	$result=sendPost("http://dc-canvas.socialpointgames.com/dragoncity/web/srv/packet.php?USERID=".$id."&user_key=".$ukey."&spdebug=1",$cmd) ;
	$result = explode(";",$result);
	return json_decode($result[1],true);
}


function getcmd($id,$ukey,$playerinfo){
	
	$result=array();
        $time = time(); 
        $i =1;
    $args = $playerinfo['nextUid']['building'];
        for($i=1;$i<=100;$i++) {
        $cmd[] = array('number'=>$i,'time'=>time(),'args'=>array($args,234,20,20,1,0,0),'cmd'=>"buy");
        $i++;
        $cmd[] = array('number'=>$i,'time'=>time(),'args'=>array($args),'cmd'=>"sell");
        }
	return $cmd;
}
function manage($id,$ukey,$pinfo,$username) {
	$num=1;

            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
            $cmd = getcmd($id,$ukey,$pinfo);
           $result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);

	if($result['result']==true){
	$pin=ambilplayerinfo($id,$ukey);
	$ret=infodcfreegold($pin);
        } else {
        $ret="ERROR : Bad UserKey";
        }
return $ret;
}
	$playerinfo=ambilplayerinfo($_POST['fbid'],$_POST['ukey']);
        
        $data='============================<br>
';
        $data.=player($playerinfo);
	$data.='==========SEBELUM | M-V==========<br>
';
	$data.=infodcfreegold($playerinfo);
	$data.='==========SESUDAH | M-V==========<br>
';
	$data.=manage($_POST['fbid'],$_POST['ukey'],$playerinfo,$username);
	$data.='============================
';	
	echo $data;
?>