
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
    <div data-role="navbar" data-iconpos="left">
        <ul>
            <li><a href="home.php" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
            <li><a href="acc.php" data-icon="home" data-ajax="false" data-theme="a">Disetujui</a></li>
             <li><a href="#" data-icon="home" data-ajax="false" data-theme="a">Stok Barang</a></li>
            <li><a href="logout.php" data-icon="home" data-ajax="false" data-theme="a">Logout</a></li>
        </ul>
    </div>
	</div>         
	<div data-role="content" data-theme="a">
    <label for="barvalue" class="ui-hidden-accessible"></label>
    <input type="hidden" id="barvalue" value="<?php echo count($dataa); ?>">

    <ul data-role="listview" data-theme="a"  data-mini="true" data-divider-theme="a" data-filter="true"   data-filter-placeholder="Cari Barang...">
    <?php 
    $i = 0; $a = 1;
    foreach ($dataa as $key => $row) {
    $per = ($row['Stok_Barang']*100) /  $MAX;
    $percentage = ceil($per)."%";
    ?>
    <li>
        
        <img src="image/ojk.ico" alt="">
        <h2 class="listf"><?php echo $row['Jenis_Barang'].' [<span id="barpercen-txt">'.$row['Kode_Barang'].'<span>]'; ?></h2>
        <p><?php echo "Stok Awal $MAX ".$row['Keterangan']; ?></p>
        <p><?php echo 'Sisa <span id="barpercen-txt">'.$row['Stok_Barang']." ".$row['Keterangan']."</span>" ?></p>
        <div  id="progressbar" class="bar<?php echo "$i";?>"></div>
        <!--count subcategory-->  
        <?php
       
        ?>
        <label for="barpercen<?php echo $i; ?>" class="ui-hidden-accessible"></label>
        <input type="hidden" name="barpercen" id="barpercen<?php echo $i-1; ?>" value="<?php echo ceil($per); ?>">
                  
        <div id="barpercen-txt" class="ui-li-aside"><?php echo "$percentage"; ?></div>      
        
      <!--Config setup-->   
        
    </li>
    <?php
    $a++; $i++;
 
    } ?>
    </ul>
  	</div>

	<div data-role="footer" data-position="fixed" data-id="mainfoot">
	</div>	
	</div>
</body>
</html>