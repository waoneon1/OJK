
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

//$data = new database;

$pross = "  SELECT tb_permintaanbrg.*, user.Nama, 
          tb_barang.Jenis_Barang, tb_barang.Stok_Barang, tb_barang.Keterangan, tb_barang.Stok_Barang
          FROM tb_permintaanbrg 
          INNER JOIN user
          ON tb_permintaanbrg.NIP=user.niplg
          INNER JOIN tb_barang
          ON tb_permintaanbrg.Kode_Barang=tb_barang.Kode_Barang
          WHERE tb_permintaanbrg.id =
          ".$_GET['ids'];
echo $pross;
          $result = mysqli_query($con, $pross);   
          $row = mysqli_fetch_array($result);

 ?>
<body>
<div data-role="page" >
<div data-role="header" class="header w">
  <h2><span>Form Persetujuan</span></h2>
  <a href="index.php" data-ajax="false" data-role="button" data-theme="d" data-icon="arrow-l" class="ui-icon-alt" data-iconpos="notext">back</a>
</div>

<div data-role="content">
  <form method="post" action="register.php" data-ajax="false"><!-- data-ajax="false" -->
  <ul data-role="listview" data-theme="d">
  <li>
  
    <div data-role="fieldcontain">
        <label for="jenbar">Jenis Barang</label>
       <td> <input type="text" name="jenbar" id="jenbar"  value="<?php echo $row['Jenis_Barang']; ?>" data-mini="true" readonly>
    </div>
    
   
    <div data-role="fieldcontain">
        <label for="slider-fill">Permintaan Yang Disetujui</label>
        <input type="range" name="slider-fill" id="slider-fill" value="60" min="0" max="1000" step="50" data-highlight="true">
    </div> 
   
    <input type="submit" data-icon="check" name="reg" value="register" data-mini="true" data-inline="true" data-theme="a"></td></tr>
  
    </li>
  </ul>
  </form>
</div>

<div data-role="footer" data-position="fixed" data-id="mainfoot">
</div>

</div> 
 
 </body>
 </html>
