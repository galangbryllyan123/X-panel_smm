<?php
if(isset($_POST['fbid'])){
	$cid = round(rand() * 0x40000000);
	$postdata=array('neighbors'=>"",'client_id'=>$cid);
	$result=sendPost("http://dynamicmw.socialpointgames.com/appsfb/menvswomen/srvsexwars/get_player_info.php?USERID=$_POST[fbid]&user_key=$_POST[ukey]&spdebug=1",$postdata);
	$payload = explode(';',$result);
	$data = json_decode($payload[1],true);
	if($data['result']=='error'){
		$str= 'ERROR : bad user_key';
		goto habis;
	}
	$str='';
	$str .= "======================<br>
";
	$str .= "FBID : ".$data['playerInfo']['pid']."
";
	$str .= "NAMA : ".$data['playerInfo']['name']."
";
	$str .= "=======SEBELUM=======<br>
";
	$str .= "CASH : ".number_format($data['playerInfo']['cash'],0,',','.')."
";
	$str .= "GOLD : ".number_format($data['map']['gold'],0,',','.')."
";
	$str .= "WOOD : ".number_format($data['map']['wood'],0,',','.')."
";
	$str .= "STEEL : ".number_format($data['map']['steel'],0,',','.')."
";
	$str .= "OIL : ".number_format($data['map']['oil'],0,',','.')."
";
	$str .= "XP : ".number_format($data['map']['xp'],0,',','.')."
";
	$str .= "LEVEL : ".$data['map']['level']."
";
	$str .= "=======SESUDAH=======<br>
";
	$cmd[]=array(0,'reset',array(),array(0,0,0,0,0,0,0,0));
	$res=sendCommand($_POST['fbid'],$_POST['ukey'],'1.5.0',$cmd);
	if($res){
		$result=sendPost("http://dynamicmw.socialpointgames.com/appsfb/menvswomen/srvsexwars/get_player_info.php?USERID=$_POST[fbid]&user_key=$_POST[ukey]&spdebug=1",$postdata);
		$payload = explode(';',$result);
		$data = json_decode($payload[1],true);
		$str .= "CASH : ".number_format($data['playerInfo']['cash'],0,',','.')."
";
		$str .= "GOLD : ".number_format($data['map']['gold'],0,',','.')."
";
		$str .= "WOOD : ".number_format($data['map']['wood'],0,',','.')."
";
		$str .= "STEEL : ".number_format($data['map']['steel'],0,',','.')."
";
		$str .= "OIL : ".number_format($data['map']['oil'],0,',','.')."
";
		$str .= "XP : ".number_format($data['map']['xp'],0,',','.')."
";
		$str .= "LEVEL : ".$data['map']['level']."
";
		$str .= "======================";
	}
habis:
	echo $str;
}
function sendPost($url,$data=null){
	if($data!=null){
		$postdata=http_build_query($data);
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'timeout' => 30,
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n"."Content-Length: ".strlen($postdata)."\r\n",
				'content' => $postdata
			)
		);
	}else $opts = array('http'=>array('timeout'=>30));
	$result=file_get_contents($url,false,stream_context_create($opts));
	return $result;
}
function sendCommand($fbid,$ukey,$flash,$cmd){
		$cmd = json_encode(array('publishActions'=>"0",'commands'=>$cmd,'flashVersion'=>$flash,'first_number'=>1,'tries'=>1,'ts'=>time(),'accessToken'=>""));
		$hash = hash_hmac('sha256',$cmd,'4vVSD8dftv6hdfb1Hnk9');
		$cmd=array('data'=>$hash.';'.$cmd);
		$result=sendPost("http://dynamicmw.socialpointgames.com/appsfb/menvswomen/srvsexwars/command.php?USERID=$_POST[fbid]&user_key=$_POST[ukey]&spdebug=1",$cmd);
		$result = json_decode($result,true);
		return $result;
}

?>