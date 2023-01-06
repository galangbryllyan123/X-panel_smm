<?php
$apikey = 'PRIVATE'; // apikey akun XF - PANEL
$target = 'admin.mv'; // username atau link target
$id = '1'; // id dapat dilihat pada api info
$jumlah = '100'; // jumlah yang ingin dimasukan
$server = '1'; // pilih server

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://xf-panel.my.to/api/proses.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
          "apikey=$apikey&target=$target&id=$id&jumlah=$jumlah&server=$server");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$ret = curl_exec ($ch);
curl_close ($ch);
$result = json_decode($ret,true);
if($result['result'] == 'true'){ // resulet jika berhasil
$data.='No : '.$result['no'].'
';
$data.='Userlink : '.$result['userlink'].'
';
$data.='Barang : '.$result['barang'].'
';
$data.='Pembeli : '.$result['pembeli'].'
';
$data.='Harga : '.$result['harga'].'
';
$data.='Server : '.$result['server'].'
';
echo $data;} else {
echo $result['msg']; // result jika gagal
} ?>