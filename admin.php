
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
		
		/*var_dump($_SESSION); exit;*/
		if (isset($_GET['reject'])) {
			// echo "delete"; exit;
			$stok = $database->delete("tb_permintaanbrg", "id", $_GET['reject']); 
			if ($stok === true) {
	            echo "<script type='text/javascript'>".
	              "alert('Delete Permintaan');".
	              "window.location = 'admin.php';".
	              "</script> ";  
		    } else {
	            echo "<script type='text/javascript'>".
	                "alert('Operasi Gagal');".
	                "window.location = 'admin.php';".
	                "</script> "; 
		    }
		}

		/*if (isset($_GET['approve'])) {
			$pross = "	SELECT Jumlah_Permintaan, Kode_Barang
						FROM tb_permintaanbrg 
						WHERE id = ".$_GET['approve'];
			$result = mysqli_query($con, $pross); 	
			$ro = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$pross_br = "	SELECT Stok_Barang
					FROM tb_barang
					WHERE Kode_Barang = ".$ro['Kode_Barang'];
			$result_br = mysqli_query($con, $pross_br); 	
			$ro_br = mysqli_fetch_array($result_br, MYSQLI_ASSOC);

			if ($ro_br['Stok_Barang'] >= $ro['Jumlah_Permintaan']) {
				

				$tbl = "tb_permintaanbrg";
				$tbl_br = "tb_barang";

			    $where = "id=\"".$_GET['approve']."\"";
			    $where_br = "Kode_Barang=\"".$ro['Kode_Barang']."\"";
				
				$sisaBarang = $ro_br['Stok_Barang'] - $ro['Jumlah_Permintaan'];
			    $set = array(
			    				'NIP_Admin' => $_SESSION['niplg'],
				                'Jml_Disetujui' => $ro['Jumlah_Permintaan'], 
				                'Status' => 1
			                );
			    $set_br = array(
				            'Stok_Barang' => $sisaBarang
				             );

			    $stok = $database->update($tbl_br, $set_br, $where_br); 
	    
			    if ($stok === true) {
			        $appr = $database->update($tbl, $set, $where); 
			        if ($appr === true) {
			            echo "<script type='text/javascript'>".
			              "alert('Permintaan Telah Berhasil disetujui');".
			              "window.location = 'admin.php';".
			              "</script> ";  
			        } else {
			            echo "<script type='text/javascript'>".
			                "alert('Gagal simpan');".
			                "window.location = 'admin.php';".
			                "</script> "; 
			        }
			    } else {
			        echo "<script type='text/javascript'>".
			                "alert('Gagal simpans');".
			                "window.location = 'admin.php';".
			                "</script> ";  
			    }

			} else {
				echo "<script type='text/javascript'>".
                "alert('Stok tidak mencukupi');".
                "window.location = 'admin.php';".
                "</script> ";
			}
		}*/

			$pross1 = "	SELECT DISTINCT Kode_Transaksi, Tanggal_Permintaan
					FROM tb_permintaanbrg;
					";
			$result1 = mysqli_query($con, $pross1);
			while($a = mysqli_fetch_array($result1, MYSQLI_ASSOC)) { 
				$trans[] = $a;
			}	

			
			$pross = "	SELECT tb_permintaanbrg.*, user.Nama, 
					tb_barang.Jenis_Barang, tb_barang.Stok_Barang, tb_barang.Keterangan
					FROM tb_permintaanbrg 
					INNER JOIN user
					ON tb_permintaanbrg.NIP=user.niplg
					INNER JOIN tb_barang
					ON tb_permintaanbrg.Kode_Barang=tb_barang.Kode_Barang
					WHERE tb_permintaanbrg.Status = 0;
					";
			$result = mysqli_query($con, $pross); 	
			while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
				$rowz[] = $rows;
			}	
		
?>


<body>
	<div data-role="page" class="bd">	
		<div data-role="header" class="header" data-theme="c">
        <table><tr><td>
			<img src="image/ojk.png" /></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
            <img src="image/judul.png" /></td></tr></table>
           
		</div>
        <div id="log">
            <h2 class="g"> <span>Welcome, </span> <?php echo $_SESSION['Nama']; ?></h2>
        </div>
        
        
	<div data-role="content">
  	<form method="post" action="controller.php" data-ajax="false"><!-- data-ajax="false" -->
  	<?php 
  	$nama = "";
  	/*echo "<pre>";
	print_r($trans); exit;*/
  	foreach ($trans as $key => $tran) { 
  	$pr = "	SELECT MIN(Status) AS min
			FROM tb_permintaanbrg
			WHERE Kode_Transaksi ='".$tran['Kode_Transaksi']."'";
	$re = mysqli_query($con, $pr);
	$a = mysqli_fetch_array($re, MYSQLI_ASSOC);

  	if ($a['min'] == 0): ?>
  	<div data-role="collapsible" data-mini="true" data-theme="b" data-content-theme="a" data-inset="false">
  	<h4><?php echo "Kode Transaksi ".$tran['Kode_Transaksi']." [".'<span style = "color:#FFE840;">'.$tran['Tanggal_Permintaan'].'</span>'."]"?></h4>
	  	<ul data-role="listview" data-inset="true">
		<?php 
		foreach ($rowz as $key => $row) {
		if ($tran['Kode_Transaksi'] == $row['Kode_Transaksi']) {
		?>
	    <li><a href="admin_appr.php?ids=<?php echo $row['id']; ?>">
	    	<h2><?php echo $row['Jenis_Barang']." / ".$row['Kode_Barang']; ?></h2>
	        <p><strong><?php echo $row['Nama']; ?></strong></p>
	        <p><?php echo "Jumlah ".$row['Jumlah_Permintaan']." ".$row['Keterangan']; ?></p>
	   		<span class="ui-li-count ui-btn-up-f"> Stok <?php echo $row['Stok_Barang']; ?></span>
	   		<a href="#del<?php echo $row['id']; ?>" data-rel="popup" data-theme="e" data-icon="delete" data-iconpos="notext" class="ui-icon-alt" data-position-to="window">Tolak</a>

	    </a></li>
	    <div data-role="popup" class="ui-content confirm" id="del<?php echo $row['id']; ?>" data-theme="none">
	    	<p id="question">Tolak Permintaan ?</p>
		    <p align="center"><?php echo $row['Jenis_Barang']; ?></p>
		    <div class="ui-grid-a">
		        <div class="ui-block-a">
		            <a href="admin.php?reject=<?php echo $row['id']; ?>" id="yes" type="submit" data-mini="true" data-shadow="false" data-theme="b" data-ajax="false">Ya</a>
		        </div>
		        <div class="ui-block-b">
		            <a id="cancel" data-role="button" data-mini="true" data-shadow="false" data-theme="b" data-rel="back">Tidak</a>
		        </div>
		    </div>
		</div><!-- /popup -->
	    <?php }}  ?>
		</ul>
	</div>	
  	<?php endif ?>
  	<?php } ?>
 	</form>
</div>
		<div data-role="footer" data-position="fixed" data-id="mainfoot">
			<div data-role="navbar">
                <ul>
                    <li><a href="#" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
                    <li><a href="admin_stok.php" data-icon="check" data-ajax="false" data-theme="a">Stock Barang</a></li>
                    <li><a href="admin_histori.php" data-icon="edit" data-ajax="false" data-theme="a">Histori</a></li>
                    <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
                </ul>
            </div>
		</div>	
	</div>
</body>
</html>