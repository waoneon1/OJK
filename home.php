
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
<?php 
unset($_SESSION['data']);
include("database.php"); 
		$database = new database;
		$con = $database->db_connect();
		$pross = "select max(Kode_Transaksi) as kode from tb_permintaanbrg";
		$result = mysqli_query($con, $pross); 
		$row = mysqli_fetch_array($result);


		$pemecahan	=	explode("T", $row['kode']);
		$penulisan	=	$pemecahan[1];
		$tulis = $penulisan+1;
		
		$pross_br = "select * from tb_barang";
		$result_br = mysqli_query($con, $pross_br); 
		/*
		
		$pemecahan	=	substr($array_sql_kode_paling_terakhir[kode_terbesar],2,5);
		$tulis		=	$pemecahan + 1;
		*/
		if($tulis <= 9) 
		{
			$hasil	=	"T000".$tulis;
		} 
		else if($tulis <= 99)
		{
			$hasil = "T00".$tulis;
		}
		else if($tulis <= 999)
		{
			$hasil = "T0".$tulis;
		}
		else if($tulis <= 9999)
		{
			$hasil = "T".$tulis;
		}
			
			
?>


<body>
	<div data-role="page" class="bd">	
	<form method="post" action="preview.php" data-ajax="false"><!-- data-ajax="false" -->
		<div data-role="header" class="header" data-theme="c">
        <table><tr><td>
			<img src="image/ojk.png" /></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
            <img src="image/judul.png" /></td></tr></table>
           	<div data-role="navbar" data-iconpos="left">
                <ul>
                    <li><a href="#" data-icon="home" data-ajax="false" data-theme="a">Permintaan</a></li>
                    <li><a href="acc.php" data-icon="home" data-ajax="false" data-theme="a">Disetujui</a></li>
                    <li><a href="stok.php" data-icon="home" data-ajax="false" data-theme="a">Stok Barang</a></li>
                    <li><a href="logout.php" data-icon="home" data-ajax="false" data-theme="a">Logout</a></li>
                </ul>
            </div>
		</div>
        <div id="log">
            <h2 class="g"> <span>Welcome, </span> <?php echo $_SESSION['Nama']; ?></h2>
        </div>        
		<div data-role="content">
  
  <ul data-role="listview" data-theme="c">
  <li>
  <h2 align="center" >Permintaan Barang</h2>
 
    <table>
    <tr><td><?php $tgl=date('l, d-M-Y'); echo $tgl; ?></td></tr>
    <tr><td>Kode Transaksi</td><td>:</td><td><input name="Kode_Transaksi" type="text"  readonly value="<?php echo $hasil; ?>"  /></td></tr>
    <tr> <td> NIP </td> <td> :</td><td><input type="text" name="NIP" size="50" value="<?php echo $_SESSION['niplg']?>" readonly></td></tr>
    <tr><td> Nama</td><td>:</td><td><input type="text" name="Nama" size="50" value="<?php echo $_SESSION['Nama']?>" readonly></td></tr>
    <!-- 	 --><tr><td></td><td></td><td>&nbsp</td></tr>
     <tr><td>Barang</td><td>:</td><td><ul data-role="listview" data-filter="true"  data-filter-reveal="true" data-filter-placeholder="Cari Barang..." data-inset="true">
    <?php while($row = mysqli_fetch_array($result_br, MYSQLI_ASSOC)){ ?>
    <li>
    	<input type="checkbox" data-mini="true" name="<?php echo $row['Kode_Barang']; ?>" id="<?php echo $row['Kode_Barang']; ?>">
       	<label for="<?php echo $row['Kode_Barang']; ?>"><?php echo $row['Jenis_Barang']; ?></label>
 	

	    <label for="<?php echo $row['Kode_Barang']; ?>">Jumlah Permintaan:</label>
		<input data-mini="true" type="number" min="1" name="<?php echo $row['Kode_Barang']; ?>" />
		<span>Stok Saat ini : <?php echo $row['Stok_Barang']; ?></span>

    	<!-- <li><a href="home.php?'.$row['Kode_Barang'].'">'.$row['Jenis_Barang'].'</a></li> -->   	
    <?php } ?>
	</td></tr>
    </table>

    
  	
    </li>
  </ul>
 
</div>

<?php //} ?>
		<div data-role="footer" data-position="fixed" data-id="mainfoot">
			<input type="submit" data-icon="check" name="btn_permintaanbrg" value="Check" data-mini="true" data-inline="true" data-theme="a"></td></tr>
		</div>	
		 </form>
	</div>
</body>
</html>