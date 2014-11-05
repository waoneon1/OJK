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
  <?php include("database.php");?>
</head>
<?php 
$database = new database;
$con = $database->db_connect();



//====================================================
/*var_dump($_POST);
var_dump($_SESSION);*/
if (isset($_POST['button']) && $_POST['button'] == 'Tambahkan') {
    $tbl_br = "tb_barang";
    $where_br = "Kode_Barang=\"".$_POST['kode']."\"";
    $set_br = array(
            'Jenis_Barang' => $_POST['jenis'],
            'Keterangan' => $_POST['ket'],
            'Stok_Barang' => $_POST['stok']
             );

    $stok = $database->update($tbl_br, $set_br, $where_br); 
    
    if ($stok === true) {
        echo "<script type='text/javascript'>".
          "alert('Update Berhasil');".
          "window.location = 'admin_stok.php';".
          "</script> ";  
    } else {
        echo "<script type='text/javascript'>".
                "alert('Gagal simpans');".
                "window.location = 'admin_stok.php';".
                "</script> ";  
    }

}

?>

<body>
<div data-role="page" >
<div data-role="header" class="header w">
  <h2><span>Tambah Stok <?php echo $_GET['b'] ?></span></h2>
  <a href="admin_stok.php" data-ajax="false" data-role="button" data-theme="d" data-icon="arrow-l" class="ui-icon-alt" data-iconpos="notext">back</a>
</div>

<div data-role="content">
  <form method="post" action="admin_editStok.php" data-ajax="false"><!-- data-ajax="false" -->
  <ul data-role="listview" data-theme="d">
  <li>

    <div data-role="fieldcontain">
        <label for="kode">Kode Barang</label>
        <input type="text" name="kode" id="kode"  value="<?php echo $_GET['a'] ?>" data-mini="true" readonly>
    </div>

    <div data-role="fieldcontain">
        <label for="jenis">Jenis Barang</label>
        <input type="text" name="jenis" id="jenis" value="<?php echo $_GET['b'] ?>" data-mini="true" required>
    </div>

    <div data-role="fieldcontain">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" value="<?php echo $_GET['d'] ?>" data-mini="true" required>
    </div>

    <div data-role="fieldcontain">
        <label for="ket">Satuan</label>
        <input type="text" name="ket" id="ket" value="<?php echo $_GET['c'] ?>" data-mini="true" required>
    </div>


    <input type="submit" data-icon="check" name="button" value="Tambahkan" data-mini="true" data-inline="true" data-theme="b" data-ajax="false">
  
    </li>
  </ul>
  </form>
</div>

<div data-role="footer" data-position="fixed" data-id="mainfoot">
</div>

</div> 
 
 </body>
 </html>

