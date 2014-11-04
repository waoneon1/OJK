<?php
	include ("database.php");
	
	if(isset($_POST['btn_permintaanbrg'])) {
		$tbl="tb_permintaanbrg";
	$i = 0;
	$database = new database;
	foreach ($_POST as $key => $value) {
		if(!empty($value)  && $value != 'Submit'){
			$data[$key] = $value;
			if($i >= 3){
					$request = array(	"",
						$data['NIP'],
						$data['Kode_Transaksi'],
						$key,
						$value,
						date('Y-m-d'),
						'',
						'',
						''
					);
					$add_data = $database->insert($tbl, $request);
			}
		$i++;
		}
	}

	
	
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