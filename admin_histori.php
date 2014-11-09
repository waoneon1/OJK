
<?php include("login.php");?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<title>OJK </title>
    <link href="image/ojk.ico" rel='SHORTCUT ICON'/>
	<link rel="stylesheet"  href="css/jquery.mobile-1.3.2.css">
	<link rel="stylesheet"  href="css/finance.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.3.2.min.js"></script>
   
</head>
<?php include("database.php"); 
	$database = new database;
	$con = $database->db_connect();

	$prossA = "	SELECT niplg, Nama 
				FROM user 
				WHERE Level = 0
				";

	$resultA = mysqli_query($con, $prossA); 
	while($data = mysqli_fetch_array($resultA, MYSQLI_ASSOC)) {  	
	    $admin[] = $data;
	}
	foreach ($admin as $key => $value) {
		$adm[$value['niplg']] = $value['Nama'];
	}	

	$pross = "	SELECT tb_permintaanbrg.*, user.Nama, 
				tb_barang.Jenis_Barang, tb_barang.Stok_Barang, tb_barang.Keterangan
				FROM tb_permintaanbrg 
				INNER JOIN user
				ON tb_permintaanbrg.NIP=user.niplg
				INNER JOIN tb_barang
				ON tb_permintaanbrg.Kode_Barang=tb_barang.Kode_Barang
				WHERE tb_permintaanbrg.Status = 1; 
				";

	$result = mysqli_query($con, $pross); 
	while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  	
	    $rows[] = $data;
	}	

	/*	echo "<pre>";
   	print_r($adm); exit;*/
	// $row = array_unique($rows['']);
	foreach ($rows as $key => $value) {
		$NIP[$value['NIP']] = $value['Nama'];
	}

	foreach ($rows as $key => $value) {
		$TRANS[$value['Kode_Transaksi']] = $value['NIP'];
	}
	/*echo "<pre>";
   	print_r($a); exit;*/
   /*print_r(sqrt(12936/21/22*7)); exit;*/
?>



<body>
	<div data-role="page" class="bd">	
	<div data-role="header" class="header" data-theme="c">
    <table><tr><td>
		<img src="image/ojk.png" /></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
        <img src="image/judul.png" /></td></tr></table>
       
	</div>
	<div data-role="content">
  	<form method="post" action="controller.php" data-ajax="false"><!-- data-ajax="false" -->
  	<?php 
  	$nama = "";
  	/*echo "<pre>";
	print_r($trans); exit;*/
  	foreach ($NIP as $nip => $nama) {  ?>

  	<div data-role="collapsible" data-mini="true" data-theme="b" data-content-theme="a" data-inset="true">
  	<h4><?php echo $nip." / ".$nama?></h4>
	  	<ul data-role="listview" data-inset="true">
		<?php 
		foreach ($TRANS as $kode => $knip) { 
		if ($nip == $knip) {
		?>
		<div data-role="collapsible" data-mini="true" data-theme="a" data-content-theme="a" data-inset="false">
  		<h4><?php echo "Kode Transaksi ".$kode?></h4>
	  	<ul data-role="listview" data-inset="true">
			<?php
			foreach ($rows as $key => $row) {
			if ($nip == $row['NIP'] && $kode==$row['Kode_Transaksi']) {
			?>
		    <li>
		    	<h2><?php echo $row['Jenis_Barang']." / ".$row['Kode_Barang']; ?></h2>
		        <p><strong><?php echo 'Nama : '.$row['Nama']; ?></strong></p>
		        <p><?php echo "Jumlah : ".$row['Jumlah_Permintaan']." ".$row['Keterangan']; ?></p>
		        <p><?php echo "Yang Meyetujui : ".$adm[$row['NIP_Admin']]; ?></p>
		   		<span class="ui-li-count ui-btn-up-f"><?php echo $row['Tanggal_Permintaan']; ?></span>
		   	</li>
		    <?php
			}
		    }
	echo '</ul>
		</div>';
		}	
		}  ?>
		</ul>
	</div>	
  	<?php } ?>
 	</form>
</div>

	<div data-role="footer" data-position="fixed" data-id="mainfoot">
		<div data-role="navbar">
            <ul>
                <li><a href="home.php" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
                <li><a href="admin_stok.php" data-icon="home" data-ajax="false" data-theme="a">Disetujui</a></li>
                <li><a href="#" data-icon="edit" data-ajax="false" data-theme="a">Histori</a></li>
                <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
            </ul>
        </div>
	</div>	
	</div>
</body>
</html>