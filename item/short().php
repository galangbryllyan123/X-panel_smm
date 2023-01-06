<?php
//COPYRIGHT 2015 BY IWGTV, ADF.LY,BIT.LY,COINURL.COM
//HAPUS ? TIDAK PUNYA HARGA DIRI
if(isset($_POST['url'])) {
$url = $_POST['url'];
$type = $_POST['type'];
//CEK URL APAKAH VALID ATAU TIDAK
if(!filter_var($_POST['url'], FILTER_VALIDATE_URL) === true) { //JANGAN DIHAPUS
echo "".$_POST['url']." is not a valid URL
";
} else {
if($type == 1) {
//UUID CARI DI MENU
$result = file_get_contents("https://coinurl.com/api.php?uuid=557bd13ce5d57091053087&url=".$url);
} else if($type == 2) {
//UID & KEY CARI DI MENU
$result = file_get_contents("http://api.adf.ly/api.php?key=ee89ce6384472aeff99aa73e34ed58e9&uid=10252327&advert_type=int&domain=adf.ly&url=".$url);
} else if($type == 3) {
//TOKEN CARI DI https://bitly.com/a/oauth_apps
$fgc = file_get_contents("https://api-ssl.bitly.com/v3/shorten?access_token=7bdb4883526b845764cf568cbdc110c903ae6a80&longUrl=".$url);
$jd = json_decode($fgc); //JANGAN DIHAPUS
foreach($jd as $key) { //JANGAN DIHAPUS
if('$key') { //JANGAN DIHAPUS
$result = $key->url;
}
}
} else {
echo "ERROR....
";
}
//JIKA ERROR MAKA FAILED....
if($result == 'error' || $result == '' || $result == '{ "data": [ ], "status_code": 500, "status_txt": "INVALID_URI" }') {
echo "Failed....
";
} else {
echo "".$result." <br/>
";
}}}
?>