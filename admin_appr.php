<?php include("login.php");?>
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
  <script type="text/javascript">
   
</script>
  <?php 
  include("database.php");
  ?>
</head>
<?php 
$database = new database;
$con = $database->db_connect();



//====================================================
/*var_dump($_POST);
var_dump($_SESSION);*/

if (isset($_POST['button']) && $_POST['button'] == 'Approve') {

  if ($_POST['stok'] >= $_POST['jml_permintaan']) {
    $tbl = "tb_permintaanbrg";
    $tbl_br = "tb_barang";

    $where = "id=\"".$_POST['id']."\"";
    $where_br = "Kode_Barang=\"".$_POST['kodeBr']."\"";

    $set = array(
            'NIP_Admin' => $_SESSION['niplg'],
            'Jml_Disetujui' => $_POST['jml_permintaan'], 
            'Status' => 1 );
    $sisaBarang = $_POST['stok'] - $_POST['jml_permintaan'];
    $set_br = array(
            'Stok_Barang' => $sisaBarang
             );

    $stok = $database->update($tbl_br, $set_br, $where_br); 
    
    if ($stok === true) {
        $appr = $database->update($tbl, $set, $where); 
        if ($appr === true) {
            /**/
            echo "<script type='text/javascript'>".
              "alert('Permintaan Telah Berhasil disetujui');".
              "window.location = 'admin.php';".
              "</script> ";  
        } else {
            echo "<script type='text/javascript'>".
                "alert('Gagal simpan');".
                "window.location = 'admin.php';".
                "</script> "; 
        }
    } else {
        echo "<script type='text/javascript'>".
                "alert('Gagal simpans');".
                "window.location = 'admin.php';".
                "</script> ";  
    }
  } else {
    echo "<script type='text/javascript'>".
                "alert('Stok tidak mencukupi');".
                "window.location = 'admin.php';".
                "</script> ";
  }

} else {
    $pross = "  SELECT tb_permintaanbrg.*, user.Nama, 
          tb_barang.Jenis_Barang, tb_barang.Stok_Barang, tb_barang.Keterangan, tb_barang.Kode_Barang
          FROM tb_permintaanbrg 
          INNER JOIN user
          ON tb_permintaanbrg.NIP=user.niplg
          INNER JOIN tb_barang
          ON tb_permintaanbrg.Kode_Barang=tb_barang.Kode_Barang
          WHERE tb_permintaanbrg.id =
          ".$_GET['ids']; 

          $result = mysqli_query($con, $pross);           
          $row = mysqli_fetch_array($result);
 

?>

<body>
<div data-role="page" >
<div data-role="header" class="header w">
  <h2><span>Form Persetujuan</span></h2>
  <a href="admin.php" data-ajax="false" data-role="button" data-theme="d" data-icon="arrow-l" class="ui-icon-alt" data-iconpos="notext">back</a>
</div>

<div data-role="content">
  <form method="post" action="admin_appr.php" data-ajax="false"><!-- data-ajax="false" -->
  <ul data-role="listview" data-theme="d">
  <li>
  
    <div data-role="fieldcontain">
        <label for="jenbar">Jenis Barang</label>
       <td> <input type="text" name="jenbar" id="jenbar"  value="<?php echo $row['Jenis_Barang']; ?>" data-mini="true" readonly>
    </div>

    <div data-role="fieldcontain">
       <label for="stok">Stok Barang</label>
       <td> <input type="text" name="stok" id="stok"  value="<?php echo $row['Stok_Barang']; ?>" data-mini="true" readonly>
    </div>

    <input type="hidden" name="id" id="id"  value="<?php echo $row['id']; ?>" data-mini="true">
    <input type="hidden" name="stok" id="stok"  value="<?php echo $row['Stok_Barang']; ?>" data-mini="true">
    <input type="hidden" name="kodeBr" id="kodeBr"  value="<?php echo $row['Kode_Barang']; ?>" data-mini="true">

    <div data-role="fieldcontain">
        <label for="slider-fill">Permintaan Yang Disetujui</label>
        <input type="range" name="jml_permintaan" id="slider-fill" value="<?php echo $row['Jumlah_Permintaan']; ?>" min="0" max="<?php echo $row['Jumlah_Permintaan']; ?>" step="1" data-highlight="true">
    </div> 
   
    <input type="submit" data-icon="check" name="button" value="Approve" data-mini="true" data-inline="true" data-theme="b" data-ajax="false">
  
    </li>
  </ul>
  </form>
</div>

<div data-role="footer" data-position="fixed" data-id="mainfoot">
</div>

</div> 
 
 </body>
 </html>

 <?php } ?>
