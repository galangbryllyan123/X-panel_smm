<?PHP
if(isset($_POST['fbid'])){
	$playerinfo=ambilplayerinfo($_POST['fbid'],$_POST['ukey']);

	$data.='<br>======================
';
	$data.= "<br>FBID : ".$_POST['fbid']."
";
	$data.='<br>=======BEFORE=======
';
	$data.=infodcfreegold($playerinfo);
	$data.='<br>=======AFTER=======
';
	$data.=dcfreexp($_POST['fbid'],$_POST['ukey'],$_POST['jumlah'],$playerinfo);
	$data.='<br>======================
';
	echo $data;
}
function ambilkodedc($kode,$playerinfo){
	foreach ($playerinfo['map']['items'] as $dat => $isi) {
		if ($isi[0]==$kode){
			return $dat;
		}
	}
}
function ambilplayerinfo($id,$ukey){
	$result=sendPost("http://dc-canvas.socialpointgames.com/dragoncity/web/srv/get_player_info.php?USERID=".$id."&user_key=".$ukey."&spdebug=1",null);
	$result = explode(";",$result);
	$result = json_decode($result[1],true);
	return $result;
}
function sendPost($url,$data=null){
	$ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: 127.0.0.1",
	"X-Client-IP: 127.0.0.1",
	"Client-IP: 127.0.0.1",
	"HTTP_X_FORWARDED_FOR: 127.0.0.1",
	"X-Forwarded-For: 127.0.0.1"));

//	curl_setopt($ch, CURLOPT_TIMEOUT_MS, 4000);
//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);	
//	curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
 //   curl_setopt($ch, CURLOPT_PROXY, '23.23.166.15:9231');
 	if($data!=null){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
	}
    $result = curl_exec ($ch);  
    curl_close ($ch);  
	return $result;	
}
function infodcfreegold($data){
	$return.= '<br>NAME :'.$data['playerInfo']['name'];
;
	$return.= '<br>XP :'.number_format($data['playerInfo']['xp'],0,',','.').'
';
	$return.= '<br>LEVEL :'.$data['playerInfo']['level'].'
';
return $return;	
}
function kirimperintah($id,$ukey,$cmd,$num){
	$cmd = json_encode(array('publishActions'=>0,'commands'=>$cmd,'flashVersion'=>'0.7.3','first_number'=>$num,'tries'=>1,'ts'=>time()));
	$hash = hash_hmac('sha256',$cmd,'RGhXbiy4xEeDnSNX1oBG');
	$cmd=array('data'=>$hash.';'.$cmd,'id'=>$id);
	$result=sendPost("http://dc-canvas.socialpointgames.com/dragoncity/web/srv/packet.php?USERID=".$id."&user_key=".$ukey."&spdebug=1",$cmd) ;
	//echo $result;
	//echo json_encode($cmd);
	$result = explode(";",$result);
	$result = json_decode($result[1],true);
	return $result;
}
function DCCmdXp($kodetavern,$jum){
	$cmd=array();
	$i=1;$num=10*$jum;
	
	for($i=1;$i<=$jum;$i++){
		$cmd[]=array('number'=>1,'time'=>time(),'args'=>array($kodetavern),'cmd'=>'FinishBuilding');	
		$cmd[]=array('number'=>1,'time'=>time(),'args'=>array($kodetavern),'cmd'=>'FinishBuilding');	
		$cmd[]=array('number'=>1,'time'=>time(),'args'=>array($kodetavern),'cmd'=>'FinishBuilding');	
		$cmd[]=array('number'=>1,'time'=>time(),'args'=>array($kodetavern),'cmd'=>'FinishBuilding');	
	}
	return $cmd;

}
function dcfreeXP($id,$ukey,$jum,$playerinfo){
	$kodetavern=ambilkodedc(40,$playerinfo);
	$result=array();
	$cmd=array();
	$i=1;
	$num=1;
	
if($jum==1){
		$cmd=DCCmdXp($kodetavern,20);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
  }elseif($jum==2){
        $cmd=DCCmdXp($kodetavern,20);
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
    }elseif($jum==3){
        $cmd=DCCmdXp($kodetavern,20);
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
    }elseif($jum==4){
        $cmd=DCCmdXp($kodetavern,20);
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
		$num=$num+count($cmd);
}elseif($jum==5){
 	  		$cmd=DCCmdXp($kodetavern,20);
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
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
		$result=kirimperintah($id,$ukey,$cmd,$num);
		$num=$num+count($cmd);
}elseif($jum==6){
 	  		$cmd=DCCmdXp($kodetavern,20);
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
		$num=$num+count($cmd);
	}
		$ret='';
	if($result['result']==true){
		$data=ambilplayerinfo($id,$ukey);
		$ret.=infodcfreegold($data);
		$ret.='<br><small>Developed By Sebastian Ramadhan :)';
	}else{
		$ret.='ERROR : '.$result['eror'].'
';
	}
	return $ret;
}

?>       <br />
