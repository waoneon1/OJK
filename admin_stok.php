
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
	</div>
  <div id="log">
      <h2 class="g"> <span>Welcome, </span> <?php echo $_SESSION['Nama']; ?></h2>
  </div>
         
	<div data-role="content" data-theme="a">
    <label for="barvalue" class="ui-hidden-accessible"></label>
    <input type="hidden" id="barvalue" value="<?php echo count($dataa); ?>">

  	<form method="post" action="controller.php" data-ajax="false"><!-- data-ajax="false" -->
    <ul data-role="listview" data-theme="f"  data-mini="true" data-divider-theme="a" data-filter="true"   data-filter-placeholder="Cari Barang...">
    <?php 
    $i = 0; $a = 1;
    // while($row = mysqli_fetch_array($result)) {  
    foreach ($dataa as $key => $row) {
    ?>
    <li>
        <a href="#" data-rel="popup" data-transition="pop">
        <img src="image/ojk.ico" alt="">
        <h2 class="listf"><?php echo $row['Jenis_Barang'].' [<span id="barpercen-txt">'.$row['Kode_Barang'].'<span>]'; ?></h2>
        <p><?php echo "Stok Awal $MAX ".$row['Keterangan']; ?></p>
        <p><?php echo 'Sisa <span id="barpercen-txt">'.$row['Stok_Barang']." ".$row['Keterangan']."</span>" ?></p>
        <div  id="progressbar" class="bar<?php echo "$i";?>"></div>
        <!--count subcategory-->  
        <?php
        $per = ($row['Stok_Barang']*100) /  $MAX;
        $percentage = ceil($per)."%";
        ?>
        <label for="barpercen<?php echo $i; ?>" class="ui-hidden-accessible"></label>
        <input type="hidden" name="barpercen" id="barpercen<?php echo $i-1; ?>" value="<?php echo ceil($per); ?>">
                  
        <div id="barpercen-txt" class="ui-li-aside"><?php echo "$percentage"; ?></div>      
        </a>
      <!--Config setup-->   
        <a href="admin_editStok.php?<?php echo 
        "a=".$row['Kode_Barang']."&b=".$row['Jenis_Barang']."&c=".$row['Keterangan']."&d=".$row['Stok_Barang'];
         ?>" data-ajax="false" data-icon="Plus" data-theme="e">Tambah Stok</a>
    </li>
    <?php 
    $a++; $i++;
    } ?>
    </ul>
  	</form>
  	</div>

	<div data-role="footer" data-position="fixed" data-id="mainfoot">
		<div data-role="navbar">
            <ul>
            <li><a href="admin.php" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
            <li><a href="#" data-icon="check" data-ajax="false" data-theme="a">Stock Barang</a></li>
            <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
            </ul>
        </div>
	</div>	
	</div>
</body>
</html>