<?php
	mysql_connect("localhost","volcompa_nel","sudah123");
	mysql_select_db("volcompa_nel"); 
	$nominal = $_POST['nominal'];
    $kode = $_POST['kode']; 
    mysql_query("INSERT INTO generator(nominal, kode) VALUES('$nominal','$kode')");
    echo "<h2>Kode Berhasil Ditambah!</h2>
    Nominal: $nominal <br/>
	Kode: $kode <br/>
	<a href='index.php'>Kembali</a>";
	
    ?>