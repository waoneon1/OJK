
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
	if(isset($_POST['button']) && $_POST['button'] == 'by user' && isset($_POST['dateS']) && isset($_POST['dateF'])){
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
					WHERE tb_permintaanbrg.Status = 1
					AND tb_permintaanbrg.Tanggal_Permintaan 
					between '".$_POST['dateS']."' AND '".$_POST['dateF']."'
					; 
					";
		// echo $pross; exit;
		$result = mysqli_query($con, $pross); 
		while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  	
		    $rows[] = $data;
		}	

		/*echo "<pre>";
	   	print_r($user); exit;*/

		foreach ($rows as $key => $value) {
			$NIP[$value['NIP']] = $value['Nama'];
		}

		foreach ($rows as $key => $value) {
			$TRANS[$value['Kode_Transaksi']] = $value['NIP'];
		}
	} elseif (isset($_POST['button'])  && $_POST['button'] == 'by date') {
		$pross = "	SELECT 
					tb_permintaanbrg.Kode_Barang,
					tb_barang.Jenis_Barang,
					count(tb_permintaanbrg.Jumlah_Permintaan) as kaliPer,
					sum(tb_permintaanbrg.Jumlah_Permintaan) as jmlPer,
					sum(tb_permintaanbrg.Jml_Disetujui) as jmlTrim

					FROM tb_permintaanbrg 
					INNER JOIN user ON tb_permintaanbrg.NIP=user.niplg 
					INNER JOIN tb_barang ON tb_permintaanbrg.Kode_Barang=tb_barang.Kode_Barang 
					WHERE tb_permintaanbrg.Status = 1 
					AND tb_permintaanbrg.Tanggal_Permintaan between '".$_POST['dateS']."' AND '".$_POST['dateF']."' 
					GROUP BY tb_permintaanbrg.Kode_Barang
					ORDER BY jmlTrim DESC
					";
		// echo $pross; exit;
		$result = mysqli_query($con, $pross); 
		while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  	
		    $bydate[] = $data;
		}	
	}

	$prossA = "	SELECT niplg, Nama 
				FROM user 
				WHERE Level = 1
				";

	$resultA = mysqli_query($con, $prossA); 
	while($data = mysqli_fetch_array($resultA, MYSQLI_ASSOC)) {  	
	    $user[] = $data;
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
       	<div data-role="navbar"  data-iconpos="left">
            <ul>
                <li><a href="admin.php" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
                <li><a href="admin_stok.php" data-icon="check" data-ajax="false" data-theme="a">Stock Barang</a></li>
                <li><a href="#" data-icon="edit" data-ajax="false" data-theme="a">Histori</a></li>
                <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
            </ul>
        </div>
	</div>
	<div data-role="content" data-theme="b">
  	<form method="post" action="admin_histori.php" data-ajax="false"><!-- data-ajax="false" -->
  	<div data-role="collapsible" data-mini="true" data-theme="a" data-content-theme="a" data-inset="true">
	<h4>Search</h4> 	
		<div data-role="fieldcontain">
		  	<label for="user" class="select">Pilih User</label>
			<select name="user" id="user" data-mini="true" data-inline="true" data-native-menu="false" data-theme="c">
			<?php 
			foreach ($user as $key => $value) { 
				echo '<option value="'.$value['Nama'].'">'.$value['Nama'].'</option>';
			} ?>
			</select>
		</div>
		<div data-role="fieldcontain">
			<label for="dateS">Mulai Tanggal</label>
			<input type="date" name="dateS" id="dateS" value="<?php echo date("Y-m-d", strtotime("-30 day")); ?>" data-mini="true" data-inline="true" required>
		</div>
		<div data-role="fieldcontain">
			<label for="dateF">Sampai Tanggal</label>
			<input type="date" name="dateF" id="dateF" value="<?php echo date("Y-m-d"); ?>" data-mini="true" data-inline="true" readonly>
		</div>
		<input type="submit" data-icon="check" name="button" value="by user" data-mini="true" data-inline="true" data-theme="a" data-ajax="false">
		<input type="submit" data-icon="check" name="button" value="by date" data-mini="true" data-inline="true" data-theme="a" data-ajax="false">
	</div>
  	<?php 
  	$nama = "";
  /*	echo "<pre>";
	print_r($_POST); exit;*/
	if(isset($_POST['button']) && $_POST['button'] == 'by user'){
  	foreach ($NIP as $nip => $nama) {  
	if(isset($_POST['user']) && $_POST['user']==$nama) { ?>
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
		   		<span class="ui-li-count ui-btn-up-f"><?php echo date('d F Y', strtotime($row['Tanggal_Permintaan'])); ?></span>
		   	</li>
		    <?php
			}
		    }
	echo '</ul>
		</div>';
		}	
		} 
		?>
		</ul>
  	<?php 
  	} 
  	}
  	} elseif (isset($_POST['button'])  && $_POST['button'] == 'by date') {
  		/*echo "<pre>";
		print_r($bydate); exit;*/
  		?>
		<ul data-role="listview" data-inset="true" data-theme="a">
			<h4><strong><?php echo "Histori permintaan tanggal ".$_POST['dateS']." s/d tanggal ".$_POST['dateF']; ?></strong></h4>
			<?php
			foreach ($bydate as $key => $row) {
			?>
		    <li>
		    	<h4><strong><?php echo $row['Kode_Barang']; ?></strong></h4>
		    	<h2><?php echo $row['Jenis_Barang']; ?></h2>
		        <p><?php echo "Request sebanyak : ".$row['kaliPer']." kali"; ?></p>
		        <p><?php echo "Jumlah Permintaan ".$row['jmlPer']; ?></p>
		        <h1><?php echo "Jumlah yang disetujui ".$row['jmlTrim']; ?></h1>
		   	</li>
		    <?php } ?>
		</ul>
  	<?php } ?>
 	</form>
</div>

	<div data-role="footer" data-position="fixed" data-id="mainfoot">
	</div>	
	</div>
</body>
</html>