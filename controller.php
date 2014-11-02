<?php
	include ("database.php");
	
	if(isset($_POST['btn_permintaanbrg'])) {
		$tbl="tb_permintaanbrg";
	$i = 0;
	$data['Barang'] = "";
	$data['Jumlah_Permintaan'] = 0;
	foreach ($_POST as $key => $value) {
		if(!empty($value)  && $value != 'Submit'){
			$data[$key] = $value;
			if($i >= 3){
				$data['Barang'] .= " $key";
				$data['Jumlah_Permintaan'] = $data[$key] + $data['Jumlah_Permintaan'];
			}
		$i++;
		}
	}

	$request = array(	"",
						$data['NIP'],
						$data['Kode_Transaksi'],
						$data['Barang'],
						$data['Jumlah_Permintaan'],
						date('Y-m-d'),
						
					);

	$database = new database;
	$add_data = $database->insert($tbl, $request);
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
	

	/*echo "<pre>";
	print_r($data);
	print_r($request);*/
	

}

	// echo "<pre />";
	// print_r($data);
	// print_r($tgl);

			// $data->insert($tbl, $values);
?>