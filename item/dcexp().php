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
// curl_setopt($ch, CURLOPT_PROXY, $prox);
// curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'lastevo:tgarvinza');
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
$pinfo.= 'NAMA : '.$data['playerInfo']['name'].'
';
$pinfo.= 'FBID : '.$data['playerInfo']['pid'].'
';
return $pinfo;
}
function infodcfreegold($data){
	
$dat = 'GEMS : '.number_format($data['playerInfo']['cash'],0,',','.').'
';
$dat .= 'GOLD : '.number_format($data['playerInfo']['gold'],0,',','.').'
';
$dat .= 'FOOD : '.number_format($data['playerInfo']['food'],0,',','.').'
';
$dat .= 'EXP : '.number_format($data['playerInfo']['xp'],0,',','.').'
';
$dat .= 'LEVEL : '.$data['playerInfo']['level'].'
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
        for($i=1;$i<=315;$i++) {
        $cmd[] = array('number'=>$i,'time'=>time(),'args'=>array($args,218,20,20,1,0,0),'cmd'=>"buy");
        $i++;
        $cmd[] = array('number'=>$i,'time'=>time(),'args'=>array($args),'cmd'=>"sell");
        }
	return $cmd;
}
function manage($id,$ukey,$pinfo) {
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

	if($result['result']==true){
	$pin=ambilplayerinfo($id,$ukey);
	$ret=infodcfreegold($pin);
        } else {
        $ret="ERROR : Bad UserKey";
        }
return $ret;
}
	$playerinfo=ambilplayerinfo($_POST['fbid'],$_POST['ukey']);
        $data='<br>==========Host-Voc==========<br>
';
        $data.=player($playerinfo);
	$data.='<br>==========First==========<br>
';
	$data.=infodcfreegold($playerinfo);
	$data.='<br>==========Last==========<br>
';
	$data.=manage($_POST['fbid'],$_POST['ukey'],$playerinfo);
	echo $data;
?>
