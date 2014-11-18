<?php include("login.php");?>
<?php
include("database.php"); 
$database = new database;
$con = $database->db_connect();



//====================================================
/*echo "<pre>";
print_r($_SESSION); */
//if (isset($_GET['id'])) {
$save = true;
    foreach ($_SESSION['datax'] as $key => $value) {
        if ($value['Kode_Transaksi'] == $_GET['id']) {
            if ($value['Stok_Barang'] >= $value['Jumlah_Permintaan']) {
                $tbl = "tb_permintaanbrg";
                $tbl_br = "tb_barang";

                $where = "Kode_Barang=\"".$value['Kode_Barang']."\"";
                $where_br = "Kode_Barang=\"".$value['Kode_Barang']."\"";
                
                $sisaBarang = $value['Stok_Barang'] - $value['Jumlah_Permintaan'];
                $set = array(
                                'NIP_Admin' => $_SESSION['niplg'],
                                'Jml_Disetujui' => $value['Jumlah_Permintaan'], 
                                'Status' => 1
                            );
                $set_br = array(
                            'Stok_Barang' => $sisaBarang
                             );

                $stok = $database->update($tbl_br, $set_br, $where_br); 
                if ($stok === true) {
                    $appr = $database->update($tbl, $set, $where); 
                    if ($appr === true) {
                      
                    } else {
                        $save = fales; 
                    }
                }
                         
            } else {
                $save = fales; 
            }
        }
    }

    if ($save == true) {
          echo "<script type='text/javascript'>".
                          "alert('Permintaan Telah Berhasil disetujui');".
                          "window.location = 'admin.php';".
                          "</script> ";  
    }
//}