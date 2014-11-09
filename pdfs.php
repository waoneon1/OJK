<?php include("login.php"); ?>
<?php 
print_r($_GET);

echo  '
<table border="1">
<tr>
  <th align="center" rowspan="2" width="30">No</th>
  <th align="center" rowspan="2" width="120">Kode Barang</th>
  <th align="center" rowspan="2" width="350">Nama Barang</th>
  <th align="center" colspan="2" width="140">Permintaan</th>
</tr>
<tr>
  <th align="center">Jumlah</th>
  <th align="center">Satuan  </th>
</tr>
';

$i = 0; $no = 1;
foreach ($_SESSION['data'][$_GET['id']] as $key => $value) {
if ($value['Status'] == '1') {
  echo  '
    <tr>
      <th align="center">'.$no.'</th>
      <th align="center">'.$value['Kode_Barang'].'</th>
      <th align="center">'.$value['Jenis_Barang'].'</th>
      <th align="center">'.$value['Jml_Disetujui'].'</th>
      <th align="center">'.$value['Keterangan'].'</th>
    </tr>
    ';
$no++;
}
$i++;
}

echo '
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');




?>
<!-- 
$tbl = '
<table border="1">
<tr>
  <th align="center" rowspan="2" width="30">No</th>
  <th align="center" rowspan="2" width="120">Kode Barang</th>
  <th align="center" rowspan="2" width="350">Nama Barang</th>
  <th align="center" colspan="2" width="140">Permintaan</th>
</tr>
<tr>
  <th align="center">Jumlah</th>
  <th align="center">Satuan  </th>
</tr>
';

$i = 0; $no = 1;
foreach ($_SESSION['data'][$_GET['id']] as $key => $value) {
if ($value['Status'] == '1') {
  $tbl .= '
    <tr>
      <th align="center">'.$no.'</th>
      <th align="center">'.$value['Kode_Barang'].'</th>
      <th align="center">'.$value['Jenis_Barang'].'</th>
      <th align="center">'.$value['Jml_Disetujui'].'</th>
      <th align="center">'.$value['Keterangan'].'</th>
    </tr>
    ';
$no++;
}
$i++;
}

$tbl .='
</table>';

$pdf->writeHTML($tbl, true, false, false, false, ''); -->
