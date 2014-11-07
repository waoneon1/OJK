
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
	<script src="js/highcharts/highcharts.js"></script>
	<script src="js/highcharts/modules/exporting.js"></script>
   
</head>
<?php include("database.php"); 
		$database = new database;
		$con = $database->db_connect();
		
		/*var_dump($_SESSION); exit;*/
		if (isset($_GET['approve'])) {
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
  
  	<ul data-role="listview" data-inset="true">
	<?php 
	$nama = "";
	while($row = mysqli_fetch_array($result)) { 
		if ($nama != $row['Kode_Transaksi']):
			echo '<li data-role="list-divider" data-theme="a">Kode Transaksi : '.$row['Kode_Transaksi'].'<span class="ui-li-count">'.$row['Tanggal_Permintaan'].'</span></li>';
			$nama = $row['Kode_Transaksi'];
		endif ?>
    <li><a href="admin_appr.php?ids=<?php echo $row['id']; ?>">
    	<h2><?php echo $row['Jenis_Barang']; ?></h2>
        <p><strong><?php echo $row['Nama']; ?></strong></p>
        <p><?php echo "Jumlah ".$row['Jumlah_Permintaan']." ".$row['Keterangan']; ?></p>
   		<span class="ui-li-count ui-btn-up-f"> Stok <?php echo $row['Stok_Barang']; ?></span>
   		<a href="admin.php?approve=<?php echo $row['id']; ?>" data-ajax="false" data-position-to="window" data-icon="check">Approve</a>
    </a></li>
    <?php }  ?>
	</ul>
  </form>
</div>

<?php //} ?>
		<div data-role="footer" data-position="fixed" data-id="mainfoot">
			<div data-role="navbar">
                <ul>
                    <li><a href="#" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
                    <li><a href="admin_stok.php" data-icon="check" data-ajax="false" data-theme="a">Stock Barang</a></li>
                    <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
                </ul>
            </div>
		</div>	
	</div>
</body>
</html>