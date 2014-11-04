
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
		$pross = "	select tb_permintaanbrg.*, user.Nama, tb_barang.Jenis_Barang, tb_barang.Stok_Barang, tb_barang.Keterangan
					from tb_permintaanbrg 
					INNER JOIN user
					ON tb_permintaanbrg.NIP=user.niplg
					INNER JOIN tb_barang
					ON tb_permintaanbrg.Kode_Barang=tb_barang.Kode_Barang;
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
    <li><a href="#">
    	<h2>Kode Transaksi : <?php echo $row['Kode_Transaksi']; ?></h2>
        <p><strong><?php echo $row['Jenis_Barang']; ?></strong></p>
        <p><?php echo "Jumlah ".$row['Jumlah_Permintaan']." ".$row['Keterangan']; ?></p>
   		<a href="#purchase" data-rel="popup" data-position-to="window" data-icon="delete">Pending</a>
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