<?php include("login.php");?>
<?php
	include ("database.php");
	
	if(isset($_POST['btn_permintaanbrg'])) {
	/*echo "<pre>";
	print_r($_SESSION['data']); exit;*/

	$data = $_SESSION['data'];
	$tbl="tb_permintaanbrg";
	$i = 0;
	$database = new database;
	foreach ($data as $key => $v) {
		$request = array('',
			$v[1],
			$v[2],
			$v[3],
			$v[4],
			$v[5],
			'',
			'',
			''
		);
		$add_data = $database->insert($tbl, $request);
	}

	
	unset($_SESSION['data']);
	if($add_data == true){
		 echo "<script type='text/javascript'>".
              "alert('Permintaan Telah Berhasil dikirim');".
              "window.location = 'home.php';".
              "</script> ";  
	} else {
		 echo "<script type='text/javascript'>".
              "alert('Permintaan Gagal');".
              "window.location = 'home.php';".
              "</script> ";  
	}
}

?>