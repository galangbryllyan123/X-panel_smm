<?PHP
if(isset($_POST['fbid'])){
	$playerinfo=ambilplayerinfo($_POST['fbid'],$_POST['ukey']);
	$data='======================<br>
';
        $data.='FBID : '.$playerinfo['playerInfo']['pid'].'
';
        $data.='NAMA : '.$playerinfo['playerInfo']['name'].'
';
	$data.='=======SEBELUM=======<br>
';
	$data.=infodcfreegold($playerinfo);
	$data.='=======SESUDAH=======<br>
';
	$data.=infodcfree($playerinfo);
	$data.='======================';
	echo $data;
}
function ambilkodedc($kode,$playerinfo){
	foreach ($playerinfo['map']['items'] as $kode => $isi) {
		if ($isi[0]==81){
			return $kode;
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

//	curl_setopt($ch, CURLOPT_TIMEOUT_MS, 2000);
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
	$return.= 'GEMS :'.number_format($data['playerInfo']['cash'],0,',','.').'
';
	$return.= 'GOLD :'.number_format($data['playerInfo']['gold'],0,',','.').'
';
	$return.= 'FOOD :'.number_format($data['playerInfo']['food'],0,',','.').'
';
	$return.= 'XP :'.number_format($data['playerInfo']['xp'],0,',','.').'
';
	$return.= 'LEVEL :'.$data['playerInfo']['level'].'
';
return $return;	
}
function infodcfree($data){
$jumlah = $_POST['jumlah'];
	$return.= 'GEMS :'.number_format($data['playerInfo']['cash']+$jumlah,0,',','.').'
';
	$return.= 'GOLD :'.number_format($data['playerInfo']['gold'],0,',','.').'
';
	$return.= 'FOOD :'.number_format($data['playerInfo']['food'],0,',','.').'
';
	$return.= 'XP :'.number_format($data['playerInfo']['xp'],0,',','.').'
';
	$return.= 'LEVEL :'.$data['playerInfo']['level'].'
';
return $return;	
}
?>