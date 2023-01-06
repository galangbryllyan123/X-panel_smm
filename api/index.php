<?php

include('settings.php');

$api_key = '';
$continue = false;
$action = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $api_key = $_POST['api_key'];
    $type = $_POST['type'];
    $service = $_POST['service'];
    $username = $_POST['username'];
    $jumlah = $_POST['jumlah'];
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $api_key = $_GET['api_key'];
    $type = $_GET['type'];
    $service = $_GET['service'];
    $username = $_GET['username'];
    $jumlah = $_GET['jumlah'];
}

if (empty($api_key)) {
    $status = '401';
    $error_message = 'Apikey mu ilang mas...';
    $data = array('status' => $status, 'error_message' => $error_message);
}

if (!empty($api_key)) {
    $continue = true;
}

if ($continue == true) {
    $query_one = "SELECT * FROM user WHERE api='$api_key'";
    $sql_query_one = mysqli_query($dbConnect, $query_one);
    $user_details = mysqli_fetch_assoc($sql_query_one);

    if (($sql_numrows_one = mysqli_num_rows($sql_query_one)) == 1) {
    
        if ($user_details['saldo'] > $total) {
            $action = true;
        } else {
            $status = '409';
            $error_message = 'Saldomu gak cukup mas...';
            $data = array('status' => $status, 'error_message' => $error_message);
            $action = false;
        }
    } else {
        $status = '408';
        $error_message = 'Kamu siapa sih... Ko bisa sampe ke sini...';
        $data = array('status' => $status, 'error_message' => $error_message);
        $action = false;
    }

    if (empty($type)) {
        $status = '402';
        $error_message = 'Typenya masih kosong mas...';
        $data = array('status' => $status, 'error_message' => $error_message);
        $action = false;
    }

    if (empty($service)) {
        $status = '403';
        $error_message = 'Service tidak boleh kosong...';
        $data = array('status' => $status, 'error_message' => $error_message);
        $action = false;
    }
                
    if (empty($username)) {
        $status = '405';
        $error_message = 'Username Masih Kosong mas...';
        $data = array('status' => $status, 'error_message' => $error_message);
        $action = false;
    }

    if (empty($jumlah)) {
        $status = '406';
        $error_message = 'Jumlahnya kekecilan mas...';
        $data = array('status' => $status, 'error_message' => $error_message);
        $action = false;
    }

    if ($jumlah < $minimal_order) {
        $status = '407';
        $error_message = 'Minimal Order 100 mas...';
        $data = array('status' => $status, 'error_message' => $error_message);
        $action = false;
    }

    if ($action == true) {
        $no = rand(1111,9999);
        $user = $user_details['username'];
        $tanggal = date("Y-m-d H:i:s");
            
        if($type = '1') { //follower ig server 1
            $allowServices = array('101'); //ini untuk follower ig server 1.
            if (!in_array($service, $allowServices)) {
                $status = '404';
                $error_message = 'Service salah';
                $data = array('status' => $status, 'error_message' => $error_message);
            } else {
                $total = $jumlah*$rate_atu;
                $save_one = "UPDATE user SET saldo=saldo-$total WHERE api='$api_key'";
                $sql_save_one = mysqli_query($dbConnect, $save_one);
        
                $save_two = "INSERT INTO historyall VALUES ('','$no','$user','$jumlah Followers Instagram Server $service ( API )','$total','Sukses','Url/Username : $username','$tanggal')";
                $sql_save_two = mysqli_query($dbConnect, $save_two);
                $last_id = mysqli_insert_id($dbConnect);

                $url = "http://creativemarket.company/api/?api_key=".$api_key."&method=".$method."&layanan=".$layanan."&username_link=".$username_link."&jumlah=".$jumlah";
                $jsonx = file_get_contents($url);
                $jsony = json_decode($jsonx, true);

                if($jsony['error'] == "1") {
                    $save_three = "UPDATE user SET saldo=saldo+$total WHERE api='$api_key'";
                    $sql_save_three = mysqli_query($dbConnect, $save_three);
                
                    $delete_one = "DELETE FROM historyall WHERE id=" . $last_id;
                    $sql_delete_one = mysqli_query($dbConnect, $delete_one);
                
                    $status = '410';
                    $error_message = 'ERROR Mas...';
                    $data = array('status' => $status, 'error_message' => $error_message);
                } else {
                    $status = '200';
                    $error_message = 'Sukses.';
                    $data = array('status' => $status, 'error_message' => $error_message);
                }
            }
        }

        if($type = '2') { // followers ig server 2
            $allowServices = array('2');  //ini untuk followers ig server 2.
            if (!in_array($service, $allowServices)) {
                $status = '404';
                $error_message = 'Service salah';
                $data = array('status' => $status, 'error_message' => $error_message);
            } else {
                $total = $jumlah*$rate_ua;
                $save_one = "UPDATE user SET saldo=saldo-$total WHERE api='$api_key'";
                $sql_save_one = mysqli_query($dbConnect, $save_one);
        
                $save_two = "INSERT INTO historyall VALUES ('','$no','$user','$jumlah Followers Instagram Server $service ( API )','$total','Sukses','Url/Username : $username','$tanggal')";
                $sql_save_two = mysqli_query($dbConnect, $save_two);
                $last_id = mysqli_insert_id($dbConnect);
                
                $url = "https://api-system.online/v1/socialmedia.php?apikey=$apikey&target=$username&id=1&jumlah=$jumlah&server=$service";
                $jsonx = file_get_contents($url);
                $jsony = json_decode($jsonx, true);

                if($jsony['error'] == "1") {
                    $save_three = "UPDATE user SET saldo=saldo+$total WHERE api='$api_key'";
                    $sql_save_three = mysqli_query($dbConnect, $save_three);
                
                    $delete_one = "DELETE FROM historyall WHERE id=" . $last_id;
                    $sql_delete_one = mysqli_query($dbConnect, $delete_one);
                
                    $status = '410';
                    $error_message = 'ERROR Mas...';
                    $data = array('status' => $status, 'error_message' => $error_message);
                } else {
                    $status = '200';
                    $error_message = 'Sukses.';
                    $data = array('status' => $status, 'error_message' => $error_message);
                }
            }
        } else {
            $status = '411';
            $error_message = 'Unknown ERROR.';
            $data = array('status' => $status, 'error_message' => $error_message);
        }
    }
}

        if($type = '3') { // followers ig server 3
            $allowServices = array('3');  //ini untuk followers ig server 3.
            if (!in_array($service, $allowServices)) {
                $status = '404';
                $error_message = 'Service salah';
                $data = array('status' => $status, 'error_message' => $error_message);
            } else {
                $total = $jumlah*$rate_iga;
                $save_one = "UPDATE user SET saldo=saldo-$total WHERE api='$api_key'";
                $sql_save_one = mysqli_query($dbConnect, $save_one);
        
                $save_two = "INSERT INTO historyall VALUES ('','$no','$user','$jumlah Followers Instagram Server $service ( API )','$total','Sukses','Url/Username : $username','$tanggal')";
                $sql_save_two = mysqli_query($dbConnect, $save_two);
                $last_id = mysqli_insert_id($dbConnect);
                
                $url = "https://api-system.online/v1/socialmedia.php?apikey=$apikey&target=$username&id=1&jumlah=$jumlah&server=$service";
                $jsonx = file_get_contents($url);
                $jsony = json_decode($jsonx, true);

                if($jsony['error'] == "1") {
                    $save_three = "UPDATE user SET saldo=saldo+$total WHERE api='$api_key'";
                    $sql_save_three = mysqli_query($dbConnect, $save_three);
                
                    $delete_one = "DELETE FROM historyall WHERE id=" . $last_id;
                    $sql_delete_one = mysqli_query($dbConnect, $delete_one);
                
                    $status = '410';
                    $error_message = 'ERROR Mas...';
                    $data = array('status' => $status, 'error_message' => $error_message);
                } else {
                    $status = '200';
                    $error_message = 'Sukses.';
                    $data = array('status' => $status, 'error_message' => $error_message);
                }
            }
        } else {
            $status = '411';
            $error_message = 'Unknown ERROR.';
            $data = array('status' => $status, 'error_message' => $error_message);
        }
    }
}

        if($type = '4') { // likes ig
            $allowServices = array('1', '2');  //ini untuk likers ig server 1 & server 2.
            if (!in_array($service, $allowServices)) {
                $status = '404';
                $error_message = 'Service salah';
                $data = array('status' => $status, 'error_message' => $error_message);
            } else {
                $total = $jumlah*$rate_mpat;
                $save_one = "UPDATE user SET saldo=saldo-$total WHERE api='$api_key'";
                $sql_save_one = mysqli_query($dbConnect, $save_one);
        
                $save_two = "INSERT INTO historyall VALUES ('','$no','$user','$jumlah Likers Instagram Server $service ( API )','$total','Sukses','Url/Username : $username','$tanggal')";
                $sql_save_two = mysqli_query($dbConnect, $save_two);
                $last_id = mysqli_insert_id($dbConnect);
                
                $url = "https://api-system.online/v1/socialmedia.php?apikey=$apikey&target=$username&id=2&jumlah=$jumlah&server=$service";
                $jsonx = file_get_contents($url);
                $jsony = json_decode($jsonx, true);

                if($jsony['error'] == "1") {
                    $save_three = "UPDATE user SET saldo=saldo+$total WHERE api='$api_key'";
                    $sql_save_three = mysqli_query($dbConnect, $save_three);
                
                    $delete_one = "DELETE FROM historyall WHERE id=" . $last_id;
                    $sql_delete_one = mysqli_query($dbConnect, $delete_one);
                
                    $status = '410';
                    $error_message = 'ERROR Mas...';
                    $data = array('status' => $status, 'error_message' => $error_message);
                } else {
                    $status = '200';
                    $error_message = 'Sukses.';
                    $data = array('status' => $status, 'error_message' => $error_message);
                }
            }
        } else {
            $status = '411';
            $error_message = 'Unknown ERROR.';
            $data = array('status' => $status, 'error_message' => $error_message);
        }
    }
}

        if($type = '5') { // likes fb
            $allowServices = array('1');  //ini untuk likers fb server 1.
            if (!in_array($service, $allowServices)) {
                $status = '404';
                $error_message = 'Service salah';
                $data = array('status' => $status, 'error_message' => $error_message);
            } else {
                $total = $jumlah*$rate_ima;
                $save_one = "UPDATE user SET saldo=saldo-$total WHERE api='$api_key'";
                $sql_save_one = mysqli_query($dbConnect, $save_one);
        
                $save_two = "INSERT INTO historyall VALUES ('','$no','$user','$jumlah Likers Facebook Server $service ( API )','$total','Sukses','Url/Username : $username','$tanggal')";
                $sql_save_two = mysqli_query($dbConnect, $save_two);
                $last_id = mysqli_insert_id($dbConnect);
                
                $url = "https://api-system.online/v1/socialmedia.php?apikey=$apikey&target=$username&id=3&jumlah=$jumlah&server=$service";
                $jsonx = file_get_contents($url);
                $jsony = json_decode($jsonx, true);

                if($jsony['error'] == "1") {
                    $save_three = "UPDATE user SET saldo=saldo+$total WHERE api='$api_key'";
                    $sql_save_three = mysqli_query($dbConnect, $save_three);
                
                    $delete_one = "DELETE FROM historyall WHERE id=" . $last_id;
                    $sql_delete_one = mysqli_query($dbConnect, $delete_one);
                
                    $status = '410';
                    $error_message = 'ERROR Mas...';
                    $data = array('status' => $status, 'error_message' => $error_message);
                } else {
                    $status = '200';
                    $error_message = 'Sukses.';
                    $data = array('status' => $status, 'error_message' => $error_message);
                }
            }
        } else {
            $status = '411';
            $error_message = 'Unknown ERROR.';
            $data = array('status' => $status, 'error_message' => $error_message);
        }
    }
}

        if($type = '6') { // favorite twitter
            $allowServices = array('1');  //ini untuk favorite twitter server 1.
            if (!in_array($service, $allowServices)) {
                $status = '404';
                $error_message = 'Service salah';
                $data = array('status' => $status, 'error_message' => $error_message);
            } else {
                $total = $jumlah*$rate_nam;
                $save_one = "UPDATE user SET saldo=saldo-$total WHERE api='$api_key'";
                $sql_save_one = mysqli_query($dbConnect, $save_one);
        
                $save_two = "INSERT INTO historyall VALUES ('','$no','$user','$jumlah Likers Favorite Twitter Server $service ( API )','$total','Sukses','Url/Username : $username','$tanggal')";
                $sql_save_two = mysqli_query($dbConnect, $save_two);
                $last_id = mysqli_insert_id($dbConnect);
                
                $url = "https://api-system.online/v1/socialmedia.php?apikey=$apikey&target=$username&id=7&jumlah=$jumlah&server=$service";
                $jsonx = file_get_contents($url);
                $jsony = json_decode($jsonx, true);

                if($jsony['error'] == "1") {
                    $save_three = "UPDATE user SET saldo=saldo+$total WHERE api='$api_key'";
                    $sql_save_three = mysqli_query($dbConnect, $save_three);
                
                    $delete_one = "DELETE FROM historyall WHERE id=" . $last_id;
                    $sql_delete_one = mysqli_query($dbConnect, $delete_one);
                
                    $status = '410';
                    $error_message = 'ERROR Mas...';
                    $data = array('status' => $status, 'error_message' => $error_message);
                } else {
                    $status = '200';
                    $error_message = 'Sukses.';
                    $data = array('status' => $status, 'error_message' => $error_message);
                }
            }
        } else {
            $status = '411';
            $error_message = 'Unknown ERROR.';
            $data = array('status' => $status, 'error_message' => $error_message);
        }
    }
}

        if($type = '7') { // retweet twitter
            $allowServices = array('1');  //ini untuk retweet twitter server 1.
            if (!in_array($service, $allowServices)) {
                $status = '404';
                $error_message = 'Service salah';
                $data = array('status' => $status, 'error_message' => $error_message);
            } else {
                $total = $jumlah*$rate_nam;
                $save_one = "UPDATE user SET saldo=saldo-$total WHERE api='$api_key'";
                $sql_save_one = mysqli_query($dbConnect, $save_one);
        
                $save_two = "INSERT INTO historyall VALUES ('','$no','$user','$jumlah Retweet Twitter Server $service ( API )','$total','Sukses','Url/Username : $username','$tanggal')";
                $sql_save_two = mysqli_query($dbConnect, $save_two);
                $last_id = mysqli_insert_id($dbConnect);
                
                $url = "https://api-system.online/v1/socialmedia.php?apikey=$apikey&target=$username&id=6&jumlah=$jumlah&server=$service";
                $jsonx = file_get_contents($url);
                $jsony = json_decode($jsonx, true);

                if($jsony['error'] == "1") {
                    $save_three = "UPDATE user SET saldo=saldo+$total WHERE api='$api_key'";
                    $sql_save_three = mysqli_query($dbConnect, $save_three);
                
                    $delete_one = "DELETE FROM historyall WHERE id=" . $last_id;
                    $sql_delete_one = mysqli_query($dbConnect, $delete_one);
                
                    $status = '410';
                    $error_message = 'ERROR Mas...';
                    $data = array('status' => $status, 'error_message' => $error_message);
                } else {
                    $status = '200';
                    $error_message = 'Sukses.';
                    $data = array('status' => $status, 'error_message' => $error_message);
                }
            }
        } else {
            $status = '411';
            $error_message = 'Unknown ERROR.';
            $data = array('status' => $status, 'error_message' => $error_message);
        }
    }
}

        if($type = '8') { // viewers youtube
            $allowServices = array('1', '2');  //ini untuk viewers youtube server 1 & server 2.
            if (!in_array($service, $allowServices)) {
                $status = '404';
                $error_message = 'Service salah';
                $data = array('status' => $status, 'error_message' => $error_message);
            } else {
                $total = $jumlah*$rate_ujuh;
                $save_one = "UPDATE user SET saldo=saldo-$total WHERE api='$api_key'";
                $sql_save_one = mysqli_query($dbConnect, $save_one);
        
                $save_two = "INSERT INTO historyall VALUES ('','$no','$user','$jumlah Viewers YouTube Server $service ( API )','$total','Sukses','Url/Username : $username','$tanggal')";
                $sql_save_two = mysqli_query($dbConnect, $save_two);
                $last_id = mysqli_insert_id($dbConnect);
                
                $url = "https://api-system.online/v1/socialmedia.php?apikey=$apikey&target=$username&id=8&jumlah=$jumlah&server=$service";
                $jsonx = file_get_contents($url);
                $jsony = json_decode($jsonx, true);

                if($jsony['error'] == "1") {
                    $save_three = "UPDATE user SET saldo=saldo+$total WHERE api='$api_key'";
                    $sql_save_three = mysqli_query($dbConnect, $save_three);
                
                    $delete_one = "DELETE FROM historyall WHERE id=" . $last_id;
                    $sql_delete_one = mysqli_query($dbConnect, $delete_one);
                
                    $status = '410';
                    $error_message = 'ERROR Mas...';
                    $data = array('status' => $status, 'error_message' => $error_message);
                } else {
                    $status = '200';
                    $error_message = 'Sukses.';
                    $data = array('status' => $status, 'error_message' => $error_message);
                }
            }
        } else {
            $status = '411';
            $error_message = 'Unknown ERROR.';
            $data = array('status' => $status, 'error_message' => $error_message);
        }
    }
}

header("Content-type: application/json");
echo json_encode($data);
mysqli_close($dbConnect);
exit();