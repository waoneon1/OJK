
<?php include("login.php");?>
<script>
function suggest(inputString){
	if(inputString.length == 0) {
		$('#suggestions').fadeOut();
	} else {
	$('#country').addClass('load');
		$.post("autosuggest.php", {queryString: ""+inputString+""}, function(data){
			if(data.length >0) {
				$('#suggestions').fadeIn();
				$('#suggestionsList').html(data);
				$('#country').removeClass('load');
			}
		});
	}
}

function fill(thisValue) {
	$('#nama').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 100);
}

function fill2(thisValue) {
	$('#kode').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 100);
}

</script>

<style>
#result {
	height:20px;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	padding:3px;
	border:1px #CCC solid;
	font-size:12px;
}
.suggestionsBox {
	position: absolute;
	left: 0px;
	top:40px;
	margin: 26px 0px 0px 0px;
	width: 200px;
	padding:0px;
	background-color:#999999;
	border-top: 3px solid #999999;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
</style>
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
		$pross = "select max(Kode_Transaksi) as kode from tb_transaksi";
		$result = mysqli_query($con, $pross); 
		$row = mysqli_fetch_array($result);


		$pemecahan	=	explode("T", $row['kode']);
		print_r($pemecahan);
		$penulisan	=	$pemecahan[1];
		echo $penulisan;
		$tulis = $penulisan+1;
		echo "icus ".$tulis;
		
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
		<div data-role="header" class="header" data-theme="c">
        <table><tr><td>
			<img src="image/ojk.png" /></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
            <img src="image/judul.png" /></td></tr></table>
           
		</div>
        <div id="log">
            <h2 class="g"> <span>Welcome, </span> <?php echo $_SESSION['Nama']; ?></h2>
        </div>
        
        
		<div data-role="content">
  <form method="post" action="controller.php"><!-- data-ajax="false" -->
  <ul data-role="listview" data-theme="d">
  <li>
  <h2 align="center" >Permintaan Barang</h2>
 
    <table>
    <tr><td><?php $tgl=date('l, d-M-Y'); echo $tgl; ?></td></tr>
    <tr><td>Kode Transaksi</td><td>:</td><td><input name="Kode_Transaksi" type="text"  readonly value="<?php echo $hasil; ?>"  /></td></tr>
    <tr> <td> NIP </td> <td> :</td><td><input type="text" name="NIP" size="50" value="<?php echo $_SESSION['niplg']?>" readonly></td></tr>
    <tr><td> Nama</td><td>:</td><td><input type="text" name="Nama" size="50" value="<?php echo $_SESSION['Nama']?>" readonly></td></tr>
    <tr><td>Nama Barang</td><td>:</td><td><div id="suggest">
				   <input type="search" onKeyUp="suggest(this.value);" name="Jenis_Barang"  onBlur="fill();" id="nama" size="70" placeholder="Nama Barang"/><input type="text" name="Kode_Barang"  readonly="readonly" onBlur="fill2();" id="kode"  size="15" placeholder="Kode Barang"/> 
				   <div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="arrow.png" style="position: relative; top: -12px; left: 30px;" alt="" />
				   <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
				   </div>
			  </div></td></tr>
    <tr><td>Jumlah Permintaan</td><td>:</td><td><input type="number" min="1" name="Jumlah_Permintaan" /></td></tr>
    </table>
  
   
    <input type="submit" data-icon="check" name="btn_permintaanbrg" value="Submit" data-mini="true" data-inline="true" data-theme="a"></td></tr>
  
    </li>
  </ul>
  </form>
</div>




<?php //} ?>
		<div data-role="footer" data-position="fixed" data-id="mainfoot">
			<div data-role="navbar">
                <ul>
                    <li><a href="menu/record/" data-icon="grid" data-ajax="false" data-theme="a">Report</a></li>
                    <li><a href="logout.php" data-icon="delete" data-ajax="false" data-theme="a">Logout</a></li>
                </ul>
            </div>
		</div>	
	</div>
</body>
</html>