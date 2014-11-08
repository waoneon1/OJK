
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
		$nip = $_SESSION['niplg'];
		$pross = "	SELECT tb_permintaanbrg.*, user.Nama, 
					tb_barang.Jenis_Barang, tb_barang.Stok_Barang, tb_barang.Keterangan
					FROM tb_permintaanbrg 
					INNER JOIN user
					ON tb_permintaanbrg.NIP=user.niplg
					INNER JOIN tb_barang
					ON tb_permintaanbrg.Kode_Barang=tb_barang.Kode_Barang
					WHERE tb_permintaanbrg.NIP = $nip;
					";

		$result = mysqli_query($con, $pross); 
		while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  	
		    $row[] = $data;
		}	
		$pross1 = "	SELECT DISTINCT Kode_Transaksi
					FROM tb_permintaanbrg 
					WHERE tb_permintaanbrg.NIP = $nip;
					";
		
		$result1 = mysqli_query($con, $pross1); 
		while($data = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {  	
		    $kode[] = $data;
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
  	<form method="post" action="pdf.php" data-ajax="false"><!-- data-ajax="false" -->

  	<ul data-role="listview" data-theme="c">
  	<li>
  	<h2 align="center" >Permintaan Barang</h2>
  	

	<?php foreach ($kode as $key => $kodeVal) { ?>
 	<table data-role="table" id="phone-table" data-mode="columntoggle" data-column-btn-text="List" data-column-btn-theme="c" class="phone-compare ui-shadow table-stroke">
    <thead>
      	<tr><th colspan="4">Kode Transaksi <?php echo $kodeVal['Kode_Transaksi']; ?></th></tr>
      	<tr>
      		<th>Jenis Barang</th>
      		<th>Jumlah Permintaan</th>
      		<th>Jumlah Disetujui</th>
      		<th>Status</th>
      	</tr>
    </thead>
    <tbody>
    	<input type="hidden" name="nip" id="nip"  value="<?php echo $row[0]['NIP']; ?>" data-mini="true">
	    <input type="hidden" name="nama" id="nama"  value="<?php echo $row[0]['Nama']; ?>" data-mini="true">
    	<?php 
    	foreach ($row as $key => $value) { ?>
	    <input type="hidden" name="kodeP[]" id="kodeP"  value="<?php echo $value['Kode_Barang']; ?>" data-mini="true">
	    <input type="hidden" name="namaP[]" id="namaP"  value="<?php echo $value['Jenis_Barang']; ?>" data-mini="true">
	    <input type="hidden" name="jmlP[]" id="jmlP"  value="<?php echo $value['Jml_Disetujui']; ?>" data-mini="true">
	    <input type="hidden" name="ketP[]" id="ketP"  value="<?php echo $value['Keterangan']; ?>" data-mini="true">
	    <input type="hidden" name="stat[]" id="stat"  value="<?php echo $value['Status']; ?>" data-mini="true">
    	<?php
    	if ($kodeVal['Kode_Transaksi'] == $value['Kode_Transaksi']) { 
	    echo '<tr style="background-color:#C2D8ED;">';
	    	echo '<td>'.$value['Jenis_Barang'].'</td>';
	    	echo '<td style="background-color:#FFDED5;">'.$value['Jumlah_Permintaan']." ".$value['Keterangan'].'</td>';
	    	echo '<td>'.$value['Jml_Disetujui']." ".$value['Keterangan'].'</td>'; 	
	    	if ($value['Status']==1) {
	    		echo '<td style="background-color:#80FF9F;">'."Ok".'</td>';
	    	} else {
	    		echo '<td style="background-color:#FFDED5;">'."Pending".'</td>';
	    	}
	    	
	    echo "</tr>";
    	} } ?>
	    <tr>
	        <td colspan="4">
	        <input type="submit" data-icon="check" name="submit" value="Download Form Transaksi <?php echo $kodeVal['Kode_Transaksi']; ?>" data-mini="true" data-theme="a">
	        </td>
	    </tr>
    </tbody>
	</table>
	<?php } ?>
	
  
 	</li>
  	</ul>
  	</form>
	</div>

	<div data-role="footer" data-position="fixed" data-id="mainfoot">
		<div data-role="navbar">
            <ul>
                <li><a href="home.php" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
                <li><a href="#" data-icon="home" data-ajax="false" data-theme="a">Disetujui</a></li>
                <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
            </ul>
        </div>
	</div>	
	</div>
</body>
</html>