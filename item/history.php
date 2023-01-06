<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
?>
				<div class="panel-heading">
					<span class="panel-title">History Transaksi</span>
				</div>
				<div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.Order</th>
                                                    <th>Pembeli</th>
                                                    <th>Barang</th>
                                                    <th>Harga</th>
                                                    <th>Status</th>
                                                    <th>Tgl. Transaksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysql_query("SELECT * FROM historyall WHERE pembeli = '$no' ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo "
<tr>
 <td>".$data[no]."</td>
 <td>".$data[pembeli]."</td>
 <td>".$data[barang]."</td>
 <td>".$data[harga]."</td>
 <td>".$data[status]."</td>
 <td>".$data[tanggal]."</td>
</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>