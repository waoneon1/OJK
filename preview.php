<?php include("login.php");?>
<?php
	//unset($_SESSION['data']);
	include("database.php"); 
	$database = new database;
	$con = $database->db_connect();
	
	$add_data = array();
	if(isset($_POST['btn_permintaanbrg'])) {
		$tbl="tb_permintaanbrg";
		$i = 0;
		foreach ($_POST as $key => $value) {
			if(!empty($value)  && $value != 'Check'){
				$data[$key] = $value;
				if($i >= 3){
						$prev = array($key, $value);
						$request = array("",
							$data['NIP'],
							$data['Kode_Transaksi'],
							$key,
							$value,
							date('Y-m-d'),
							'',
							'',
							''
						);
						$add_data[$key] = $request;
						$prev_data[] =$prev;
				}
			$i++;
			}
		}
		$_SESSION['data'] = $add_data;
	}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OJK</title>
  <link rel="stylesheet"  href="css/jquery.mobile-1.3.2.css">
  <link rel="stylesheet"  href="css/finance.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery.mobile-1.3.2.min.js"></script>
  <script type="text/javascript"></script>
</head>

<body>
<div data-role="page" >
<div data-role="header" class="header w">
  <h2><span>Preview</span></h2>
  <a href="home	.php" data-ajax="false" data-role="button" data-theme="d" data-icon="arrow-l" class="ui-icon-alt" data-iconpos="notext">back</a>
</div>

<div data-role="content">
  <form method="post" action="controller.php" data-ajax="false"><!-- data-ajax="false" -->
  	<table border="1" data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
  	<thead>
		<tr>
			<th>Kode Barang</th>	
			<th>Nama Barang</th>
			<th colspan="2">Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		//if (isset($_GET['id'])) {
			//print_r($_SESSION);
		//	foreach ($variable as $key => $value) {
				# code...
			//}
			//	unset($_SESSION['data'][$_GET['id']]);
		//}
		
		//print_r($prev_data);
		/*echo "<pre>";	
				print_r($_SESSION['data']);*/
		$i=0;
		foreach ($_SESSION['data'] as $key => $value) {
		if (isset($_GET['id'])) {
			if( $value[3] == $_GET['id'] ){
				//echo $_SESSION['data'][$i];
				unset($_SESSION['data'][$value[3]]);
				 echo "<script type='text/javascript'>".
	              "window.location = 'preview.php';".
	              "</script> ";  
			}
		}
		
		$pross = " SELECT Jenis_Barang
			FROM tb_barang 
			Where Kode_Barang =".$value[3];
		$result = mysqli_query($con, $pross); 	
	  	$data = mysqli_fetch_array($result, MYSQLI_ASSOC);	

		echo '
			<tr>
			<td>'.$value[3].'</td>
			<td>'.$data['Jenis_Barang'].'</td>
			<td>
       		<label for="jml"></label>
      		<input type="number" name="jml[]" id="jml"  value="'.$value[4].'" data-mini="true"></td>
      		<td><a href="preview.php?id='.$value[3].'" data-role="button" data-iconpos="notext" data-icon="delete">ramove</a>
    		</td>
			</tr>
		';
		$i++;
		} ?>
	</tbody>
	</table>
	<input type="submit" data-icon="check" name="btn_permintaanbrg" value="Submit" data-mini="true" data-inline="true" data-theme="a">
  </form>
</div>

<div data-role="footer" data-position="fixed" data-id="mainfoot">
</div>
</div> 
 </body>
 </html>
