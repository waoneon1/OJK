<?php
  $db = new mysqli('localhost', 'root' ,'', 'ojk');
	
	if(!$db) {
		echo 'Could not connect to the database.';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = $db->query("SELECT Kode_Barang,Jenis_Barang FROM tb_barang WHERE Jenis_Barang LIKE '%$queryString%'");
				
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
	         			echo '<li onClick="fill(\''.addslashes($result->Jenis_Barang).'\'); fill2(\''.addslashes($result->Kode_Barang).'\');">'.$result->Kode_Barang.'&nbsp;&nbsp;'.$result->Jenis_Barang.'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>