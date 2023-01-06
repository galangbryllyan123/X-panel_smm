<?PHP
if(isset($_POST['proces'])){
	$playerinfo=ambilplayerinfo($_POST['fbid']);
	$data.='======================<br>
';
	$data.= "FBID : ".$_POST['fbid']."
";
	$data.='=======SEBELUM=======<br>
';
	$data.=infomolfreegold($playerinfo);
	$data.='=======SESUDAH=======<br>
';
	$data.=molfreegold($_POST['fbid'],$_POST['jumlah'],$playerinfo);
	$data.='======================
';
	echo $data;
}
function ambilkodedc($kode,$playerinfo){
	foreach ($playerinfo['map']['items'] as $kode => $isi) {
		if ($isi[0]==49){
			return $kode;
		}
	}
}
function ambilplayerinfo($id){
	$result=sendPost("http://mc.socialpointgames.com/srv/get_player_info.php?USERID=$_POST[fbid]&spdebug=1",$postdata);
	$result = explode(";",$result);
	$result = json_decode($result[1],true);
	return $result;
}
function sendPost($url,$data=null){
	if($data!=null){
		$postdata=http_build_query($data);
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'timeout' => 120,
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n"."Content-Length: ".strlen($postdata)."\r\n",
				'content' => $postdata
			)
		);
	}else $opts = array('http'=>array('timeout'=>120));
	$result=file_get_contents($url,false,stream_context_create($opts));
	return $result;		
}
function infomolfreegold($data){
	$return.= 'GEMS : '.number_format($data['playerInfo']['cash'],0,',','.').'
';
	$return.= 'GOLD : '.number_format($data['playerInfo']['gold'],0,',','.').'
';
	$return.= 'FOOD : '.number_format($data['playerInfo']['food'],0,',','.').'
';
	$return.= 'XP : '.number_format($data['playerInfo']['xp'],0,',','.').'
';
	$return.= 'LEVEL : '.$data['playerInfo']['level'].'
';
return $return;	
}
function kirimperintah($id,$cmd){
	$cmd = json_encode(array('publishActions'=>0,'commands'=>$cmd,'flashVersion'=>'0.6.2','first_number'=>1,'tries'=>1,'ts'=>time()));
	$hash = hash_hmac('sha256',$cmd,'jM2vgkBpkvh2GVD5');
	$cmd=array('data'=>$hash.';'.$cmd,'id'=>$id);
	$result=sendPost("http://mc.socialpointgames.com/srv/packet.php?USERID=$_POST[fbid]&spdebug=1",$cmd) ;
	$result = explode(";",$result);
	$result = json_decode($result[1],true);
	return $result;
}
function ambil1mgold($id,$kodetavern,$jum){
	$cmd=array();
	$i=1;
	$num=2*$jum;
	for($i=1;$i<=$num;$i++){	
		$cmd[]=array('number'=>$i,'time'=>time(),'args'=>array($kodetavern),'cmd'=>'finish_si');
		$i++;
		$cmd[]=array('number'=>$i,'time'=>time(),'args'=>array(1041,0,0),'cmd'=>'sell_stored_dragon');
		$i++;
	}
	return $cmd;
}
function molfreegold($id,$jumlah,$playerinfo){
	$kodetavern=ambilkodedc(49,$playerinfo);
	$result=array();
	$cmd=array();
	
	$cmd=ambil1mgold($id,$kodetavern,$jumlah);
	$result=kirimperintah($id,$cmd);
	$ret='';
	if($result['result']==true){
		$data=ambilplayerinfo($id);
		$ret.=infomolfreegold($data);
	}else{
		$ret.='ERROR : '.$result['error'].'
';
	}
	return $ret;
}

?>