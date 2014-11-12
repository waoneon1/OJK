
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
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery.mobile-1.3.2.min.js"></script>
  <script>
  $(document).ready(function(){
  var x = document.getElementById("barvalue").value;
  var bar = document.getElementsByName("barpercen");
    for (var i = 0; i < x; i++) {
      $( ".bar"+i ).progressbar({
        value: Number(bar[i].value),
          max : 100
        });
    }
  });
  </script>
</head>

<?php 
$MAX = 50;
include("database.php"); 
	$database = new database;
	$con = $database->db_connect();
	
	$pross = "	SELECT * 
			FROM tb_barang 
			";
	$result = mysqli_query($con, $pross); 	
	
  while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  	
    $dataa[] = $data;
  }	
?>


<body>
	<div data-role="page" class="bd">	
	<div data-role="header" class="header" data-theme="d">
    <table><tr><td>
		<img src="image/ojk.png" /></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
    <img src="image/judul.png" /></td></tr></table>
    <a href="admin_tmbBarang.php" data-ajax="false" data-role="button" data-theme="a" data-icon="plus" data-iconpos="notext" >Tambah Barang Baru</a> 
    <a href="admin_tmbBarang.php" data-ajax="false" data-role="button" data-theme="a" data-icon="plus" data-iconpos="notext" >Tambah Barang Baru</a>    
	   <div data-role="navbar"  data-iconpos="left">
        <ul>
            <li><a href="admin.php" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
            <li><a href="#" data-icon="check" data-ajax="false" data-theme="a">Stock Barang</a></li>
            <li><a href="admin_histori.php" data-icon="edit" data-ajax="false" data-theme="a">Histori</a></li>
            <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
        </ul>
    </div>
  </div>
  <div id="log">
      <h2 class="g"> <span>Welcome, </span> <?php echo $_SESSION['Nama']; ?> 
      <a data-ajax = "false" href="admin_pdf.php">
      <img src="image/pdf.png" style="float:right; margin-right:20px;">
      </a>
      </h2>
  </div>
         
	<div data-role="content" data-theme="a">
    <label for="barvalue" class="ui-hidden-accessible"></label>
    <input type="hidden" id="barvalue" value="<?php echo count($dataa); ?>">

  	<form method="post" action="controller.php" data-ajax="false"><!-- data-ajax="false" -->
    <ul data-role="listview" data-theme="f"  data-mini="true" data-divider-theme="a" data-filter="true"   data-filter-placeholder="Cari Barang...">
    <?php 
    $i = 0; $a = 1;
    foreach ($dataa as $key => $row) {
    $per = ($row['Stok_Barang']*100) /  $MAX;
    $percentage = ceil($per)."%";
    include("admin_stok_isi.php");   
    $a++; $i++;
 
    } ?>
    </ul>
  	</form>
  	</div>

	<div data-role="footer" data-position="fixed" data-id="mainfoot">
	</div>
</body>
</html>