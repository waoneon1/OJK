<?php
	include ("database.php");
	$con=new database;
	if (isset($_POST['btn_permintaanbrg'])) {
		
	$kodetrans=$_POST['Kode_Transaksi'];
	$nip=$_POST['NIP'];
	$Nama=$_POST['Nama'];
	$nmbrg=$_POST['Jenis_Barang'];
	$kodebrg=$_POST['Kode_Barang'];
	$jmlpermintaan=$_POST['Jumlah_Permintaan'];
	$tgl= date('Y-m-d');
	
	
			$query= "insert into tb_transaksi(id,Kode_Transaksi,NIP,Nama,Tanggal_Permintaan) values('','$kodetrans','$nip','$Nama','$tgl')";
			
			$query1="insert into tb_permintaanbrg (id,Kode_Transaksi,Kode_Barang,Jenis_Barang,Jumlah_Permintaan, Tanggal_Permintaan) values('','$kodetrans','$kodebrg', '$nmbrg','$jmlpermintaan','$tgl')";
			$qry=mysql_query($query);
			$qry1=mysql_query($query1);
	
			echo "<script type='text/javascript'>".
            //"alert('value exceed budget limit');".
            "window.location = 'home.php';".
            "</script> ";
	}
	

?>