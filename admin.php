
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
			$pross = "	SELECT Jumlah_Permintaan
					FROM tb_permintaanbrg 
					WHERE id = ".$_GET['approve'];
			$result = mysqli_query($con, $pross); 	
			$jml = mysqli_fetch_array($result);

			$tbl = "tb_permintaanbrg";
		    $where = "id=\"".$_GET['approve']."\"";
		    $set = array(
		    				'NIP_Admin' => $_SESSION['niplg'],
			                'Jml_Disetujui' => $jml['Jumlah_Permintaan'], 
			                'Status' => 1
		                );
		    $appr = $database->update($tbl, $set, $where); 
		} 
			$pross = "	SELECT tb_permintaanbrg.*, user.Nama, 
					tb_barang.Jenis_Barang, tb_barang.Stok_Barang, tb_barang.Keterangan, tb_barang.Stok_Barang
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
		if ($nama != $row['Nama']):
			echo '<li data-role="list-divider" data-theme="a">'.$row['Nama'].'<span class="ui-li-count">'.$row['Tanggal_Permintaan'].'</span></li>';
			$nama = $row['Nama'];
		endif ?>
    <li><a href="admin_appr.php?ids=<?php echo $row['id']; ?>">
    	<h2><?php echo $row['Jenis_Barang']; ?></h2>
        <p><strong>Kode Transaksi : <?php echo $row['Kode_Transaksi']; ?></strong></p>
        <p><?php echo "Jumlah ".$row['Jumlah_Permintaan']." ".$row['Keterangan']; ?></p>
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
                    <li><a href="#" data-icon="grid" data-ajax="false" data-theme="a">Permintaan</a></li>
                    <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
                </ul>
            </div>
		</div>	
	</div>
</body>
</html>