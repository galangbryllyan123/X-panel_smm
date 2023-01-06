<?php
function getLevelByXp($xp){
	$listlevel=array(0,40,60,100,200,350,550,800,1113,1504,1993,2604,3368,4323,5517,7010,8876,11209,13659,16232,18934,21771,24750,27878,31162,34610,38230,42031,46022,50213,54614,59235,64087,69182,74532,80150,86049,92243,98747,105576,112746,120275,128180,136480,145195,154346,163955,174044,184637,195760,207439,219702,232578,246098,260294,275200,290851,307285,324541,342660,361685,381661,402636,424660,447785,472066,497561,524331,552440,581954,612944,645484,679651,715526,756782,804226,858787,921532,993689,1076670,1172098,1281840,1408043,1553176,1720079,1912017,2132746,2386584,2678498,3014199,3400255,3844219,4354778,4941921,5617135,6393631,7286601,8313517,9494470,2016089205);
	$j=count($listlevel);
	for($i=0;$i<$j;$i++){
		if($listlevel[$i] > $xp) break;
	}
	return $i;
}
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
	$str .= "FBID : ".$data['playerInfo']['pid']."<br>
";
	$str .= "NAMA : ".$data['playerInfo']['name']."<br>
";
	$str .= "=======SEBELUM=======<br>
";
	$str .= "CASH : ".number_format($data['playerInfo']['cash'],0,',','.')."<br>
";
	$str .= "GOLD : ".number_format($data['map']['gold'],0,',','.')."<br>
";
	$str .= "OIL : ".number_format($data['map']['oil'],0,',','.')."<br>
";
	$str .= "WOOD : ".number_format($data['map']['wood'],0,',','.')."<br>
";
	$str .= "STEEL : ".number_format($data['map']['steel'],0,',','.')."<br>
";
	$str .= "XP : ".number_format($data['map']['xp'],0,',','.')."<br>
";
	$str .= "LEVEL : ".$data['map']['level']."<br>
";
	$str .= "=======SESUDAH=======<br>
";
	$cmd[]=array(0,'set_variables',array(),array(0,(integer)$_POST['xp'],(integer)$_POST['gold'],(integer)$_POST['wood'],(integer)$_POST['oil'],(integer)$_POST['steel'],(integer)$_POST['cash'],0));
	$cmd[]=array(0,'level_up',array(getLevelByXp($data['map']['xp']+(integer)$_POST['xp'])),array(0,0,0,0,0,0,0,0));
	if(sendCommand($_POST['fbid'],$_POST['ukey'],'1.5.0',$cmd)){
		$result=sendPost("http://dynamicmw.socialpointgames.com/appsfb/menvswomen/srvsexwars/get_player_info.php?USERID=$_POST[fbid]&user_key=$_POST[ukey]&spdebug=1",$postdata);
		$payload = explode(';',$result);
		$data = json_decode($payload[1],true);
		$str .= "CASH : ".number_format($data['playerInfo']['cash'],0,',','.')."
";
		$str .= "GOLD : ".number_format($data['map']['gold'],0,',','.')."
";
		$str .= "OIL : ".number_format($data['map']['oil'],0,',','.')."
";
		$str .= "WOOD : ".number_format($data['map']['wood'],0,',','.')."
";
		$str .= "STEEL : ".number_format($data['map']['steel'],0,',','.')."
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
		$result=sendPost("http://dynamicmw.socialpointgames.com/appsfb/menvswomen/srvsexwars/command.php?USERID=$fbid&user_key=$ukey&spdebug=1",$cmd);
		$result = json_decode($result,true);
		return $result;
}

?>