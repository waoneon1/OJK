
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
	
	$pross = "	SELECT * 
			FROM tb_barang 
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
         
	<div data-role="content" data-theme="b">
  	<form method="post" action="controller.php" data-ajax="false"><!-- data-ajax="false" -->
  		<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
  <thead>
    <tr>
      <th data-priority="1"  style="background-color:#A8A8FF;">No</th>
      <th data-priority="persist" style="background-color:#8282FF;">Jenis Barang</th>
      <th data-priority="2"  style="background-color:#A8A8FF;">Kode Barang</th>
      <th data-priority="3" style="background-color:#8282FF;">Stok Barang</th>
      <th data-priority="4" style="background-color:#A8A8FF;">Satuan</th>
      <th data-priority="5" colspan="2" style="background-color:#8282FF;">Tambah Stok</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i = 1;
  while($row = mysqli_fetch_array($result)) { 
  echo '
    <tr>
      <th>'.$i.'.</th>
      <td><a href="#" data-rel="external">'.$row['Jenis_Barang'].'</a></td>
      <td>'.$row['Kode_Barang'].'</td>
      <td>'.$row['Stok_Barang'].'</td>
      <td>'.$row['Keterangan'].'</td>
      <td>'.
      '<div data-role="fieldcontain">
              <label for="tambah"></label>
              <td><input data-mini="true" type="number" min="1" name="tambah">
       </div>'
      .'</td>
      <td>'; ?>
      <a href="#?approve=a" data-ajax="false"  data-iconpos="notext" data-icon="check" data-role="button">Approve</a>
   <?php echo '</td>
    </tr>'; $i++;
   } ?>
  </tbody>
</table>
  	
	</form>
	</div>

	<div data-role="footer" data-position="fixed" data-id="mainfoot">
		<div data-role="navbar">
            <ul>
            <li><a href="admin.php" data-icon="check" data-ajax="false" data-theme="a">Permintaan</a></li>
            <li><a href="#" data-icon="grid" data-ajax="false" data-theme="a">Stock Barang</a></li>
            <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
            </ul>
        </div>
	</div>	
	</div>
</body>
</html>