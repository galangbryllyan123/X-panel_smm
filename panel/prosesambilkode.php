<?php
//lygacool.blogspot.com 
$link = mysql_connect("localhost", "volcompa_nel", "sudah123");
mysql_select_db("volcompa_nel", $link);

	$id = $_POST['id'];
	$kode = $_POST['kode'];
$tanggal = date("Y-m-d H:i:s");

	
	$result = mysql_query("SELECT * FROM generator WHERE kode='$kode'", $link);
	$tampil  = mysql_fetch_array($result);
	$nominal = $tampil['nominal'];
	$hit = mysql_num_rows($result);
	if($hit==1)
	{
        $query = mysql_query("SELECT * FROM user WHERE username = '$id'");
		$data  = mysql_fetch_array($query);
		$uangbaru = $nominal + $data['saldo'];
		if($tampil["aktif"] == 1)
		{
		$update = "UPDATE user SET saldo='$uangbaru' WHERE  username = '$id'";
		$hasil = mysql_query($update); ?>
		<div class="panel-heading">
					<span class="panel-title">Top Up Via Voucher</span>
				</div>
				<div class="panel-body">
				
<div class="clearfix">
                    <div class="pull-left">
                                               <h1 class="text-primary text-right" style="font-weight: bold;" color="#000">
                            Orderan Selesai
                        </h1>
                        <address class="mt-md mb-md">
                            <strong><?php echo $data['nama']; ?></strong><br>
                            Pegisian Saldo sebesar <?php echo $nominal; ?> telah sukses<br>
                        </address>
                    </div>
                    <div class="pull-right">
                        <h1 class="text-primary text-right" style="font-weight: normal;">
                            INVOICE
                        </h1>
						<ul class="text-left list-unstyled">
                                <li><strong>Tanggal:</strong> <?php echo $tanggal; ?></li>
                            </ul>
                    </div>
                </div>
				<hr></hr></br>
<table class="table m-n">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Kode Voucher</th>
								<th>Nominal</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $kode; ?></td>
								<td><?php echo $nominal; ?></td>
							</tr>
						</tbody>
					</table></br>
					<hr></hr>
	<?php	$hapus = "DELETE FROM generator WHERE kode='$kode'";
		$run = mysql_query($hapus);
		}
		else
		{
			echo "Maaf, Kode Telah Digunakan!";
		}
	}
	else
	{
		echo "Maaf, kode Salah!";
	}
	?>
	