<?php
//Script By Aqshal
session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
?>
				
<div class="col-md-12" id="indexmain2" style="display: block;">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading"> 
            <h3 class="panel-title">History Transaksi</h3> 
        </div> 
        <div class="panel-body"> 
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.Order</th>
                                <th>Layanan</th>
                                <th>Result</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

<?php
$i=0;

$tampil = mysql_query("SELECT * FROM historyall WHERE pembeli = '$username' ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo "
<tr>
 <td>".$data[no]."</td>
 <td>".$data[barang]."</td>
 <td>".$data[data]."</td>
 <td>".$data[harga]."</td>
 <td>".$data[status]."</td>
 <td>".$data[tanggal]."</td>
</tr>";
}
?>



                      </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>   