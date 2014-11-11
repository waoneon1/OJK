<?php include("login.php");?>
<?php
	unset($_SESSION['data']);
	include("database.php"); 
	$database = new database;
	$con = $database->db_connect();
	
	

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
						$add_data[] = $request;
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
			<th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($prev_data as $key => $value) {
		$pross = " SELECT Jenis_Barang
			FROM tb_barang 
			Where Kode_Barang =".$value[0];
		$result = mysqli_query($con, $pross); 	
	  	$data = mysqli_fetch_array($result, MYSQLI_ASSOC);	

		echo '
			<tr>
			<td>'.$value[0].'</td>
			<td>'.$data['Jenis_Barang'].'</td>
			<td>
       		<label for="jml"></label>
      		<input type="number" name="jml[]" id="jml"  value="'.$value[1].'" data-mini="true">
    		</td>
			</tr>
		';
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
