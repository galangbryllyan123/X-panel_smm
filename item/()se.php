<?php

if(isset($_POST['fbid'])){
	$jumlah_cash=$_POST['cash'];
	$jumlah_gold=$_POST['gold'];
	$cid = round(rand() * 0x40000000);
	$postdata=array('neighbors'=>"",'client_id'=>$cid);
	$result=sendPost("http://dynamic01.socialpointgames.com/appsfb/socialempires/srvempires/get_player_info.php?USERID=$_POST[fbid]&user_key=$_POST[ukey]&spdebug=1",$postdata);
	$payload = explode(';',$result);
	$data = json_decode($payload[1],true);
	$str='';
	$str .= "======================<br>
";
	$str .= "FBID : ".$data['playerInfo']['pid']."<br>
";
	$str .= "NAMA : ".$data['playerInfo']['name']."<br>
";
	$str .= "=======SEBELUM || Market-Voucher<br>
";
	$str .= "CASH : ".number_format($data['playerInfo']['cash'],0,',','.')."<br>
";
	$str .= "GOLD : ".number_format($data['map']['coins'],0,',','.')."<br>
";
	$str .= "=======SESUDAH || Market-Voucher<br>
";
	$cmd[]=array('cmd'=>'tournament_refund_resources','args'=>array('c',$_POST['cash']));
	$cmd[]=array('cmd'=>'tournament_refund_resources','args'=>array('g',$_POST['gold']));
	$res=sendCommand($_POST['fbid'],$_POST['ukey'],'1.4.05',$cid,$cmd);

	//if($res){
	$result=sendPost("http://dynamic01.socialpointgames.com/appsfb/socialempires/srvempires/get_player_info.php?USERID=$_POST[fbid]&user_key=$_POST[ukey]&spdebug=1",$postdata);
	$payload = explode(';',$result);
	$data = json_decode($payload[1],true);
	$str .= "CASH : ".number_format($data['playerInfo']['cash'],0,',','.')."<br>
";
	$str .= "GOLD : ".number_format($data['map']['coins'],0,',','.')."<br>
";
	$str .= "======================";
	//}
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
function sendCommand($fbid,$ukey,$flash,$cid,$cmd){
		$cmd = json_encode(array('publishActions'=>"0",'commands'=>$cmd,'first_number'=>1,'tries'=>1,'ts'=>time()));
		$hash = hash_hmac('sha256',$cmd,'3m0d3pwiupoetn7ysa02');
		$cmd=array('data'=>$hash.';'.$cmd,'client_id'=>$cid);
		$result=sendPost("http://dynamic01.socialpointgames.com/appsfb/socialempires/srvempires/command.php?USERID=$_POST[fbid]&user_key=$_POST[ukey]&spdebug=1",$cmd);
		$result = json_decode($result,true);
		return $result;
}

?>