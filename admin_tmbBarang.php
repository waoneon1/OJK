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
    $pross = "select max(Kode_Barang) as kode from tb_barang";
    $result = mysqli_query($con, $pross); 
    $row = mysqli_fetch_array($result);
    $kode = $row['kode'] + 1;
   
if (isset($_POST['button']) && $_POST['button'] == 'Simpan') {
  $request = array( "",
              $_POST['kode'],
              $_POST['jenis'],
              $_POST['ket'],
              $_POST['stok']
          );

  $add_data = $database->insert("tb_barang", $request);
  if($add_data == true){
     echo "<script type='text/javascript'>".
              "alert('Penambahan Barang Telah Berhasil');".
              "window.location = 'admin_tmbBarang.php';".
              "</script> ";  
  } else {
     echo "<script type='text/javascript'>".
              "alert('Gagal Simpan Kode mungkin sudah ada');".
              "window.location = 'admin_tmbBarang.php';".
              "</script> ";  
  }

} 

?>

<body>
<div data-role="page" >
<div data-role="header" class="header w">
  <h2><span>Tambah Barang</span></h2>
  <a href="admin_stok.php" data-ajax="false" data-role="button" data-theme="d" data-icon="arrow-l" class="ui-icon-alt" data-iconpos="notext">back</a>
</div>

<div data-role="content">
  <form method="post" action="admin_tmbBarang.php" data-ajax="false"><!-- data-ajax="false" -->
  <ul data-role="listview" data-theme="d">
  <li>

    <div data-role="fieldcontain">
        <label for="kode">Kode Barang</label>
        <input type="text" name="kode" id="kode"  value="<?php echo $kode ?>" data-mini="true" required>
    </div>

    <div data-role="fieldcontain">
        <label for="jenis">Jenis Barang</label>
        <input type="text" name="jenis" id="jenis" data-mini="true" required>
    </div>

    <div data-role="fieldcontain">
        <label for="stok">Stok</label>
        <input type="text" name="stok" id="stok" data-mini="true" required>
    </div>

    <div data-role="fieldcontain">
        <label for="ket">Satuan</label>
        <input type="text" name="ket" id="ket" data-mini="true" required>
    </div>


    <input type="submit" data-icon="check" name="button" value="Simpan" data-mini="true" data-inline="true" data-theme="b" data-ajax="false">
  
    </li>
  </ul>
  </form>
</div>

<div data-role="footer" data-position="fixed" data-id="mainfoot">
</div>

</div> 
 
 </body>
 </html>
