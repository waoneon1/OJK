<?php include("login.php"); ?>
<?php

require_once('tcpdf/tcpdf.php');

// create new PDF document
$page_format = array(
    'MediaBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 210, 'ury' => 145),
    //'CropBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 210, 'ury' => 145),
    //'BleedBox' => array ('llx' => 5, 'lly' => 5, 'urx' => 205, 'ury' => 292),
    // 'TrimBox' => array ('llx' => 10, 'lly' => 10, 'urx' => 200, 'ury' => 145),
    //'ArtBox' => array ('llx' => 15, 'lly' => 15, 'urx' => 195, 'ury' => 282),
    'Dur' => 3,
    'trans' => array(
        'D' => 1.5,
        'S' => 'Split',
        'Dm' => 'V',
        'M' => 'O'
    ),
    'Rotate' => 0,
    'PZ' => 1,
);
$pdf = new TCPDF("L", PDF_UNIT, /*PDF_PAGE_FORMAT*/$page_format , true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('waoneon1');
$pdf->SetTitle('Pdf Transaksi');
$pdf->SetSubject('');
$pdf->SetKeywords('TCPDF, PDF');

// set default header data

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 12);

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------


$tbl = <<<EOD
<table>
<tr>
  <th align="center">
  BON BARANG<br>
  OJK KR4 Jawa Tengah dan D.I Yogyakarta  <br>   
  </th>
</tr>
</table>
EOD;

// $pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

$tbl .= '

<table>
<tr>
  <th align="left" width="80">NIP</th>
  <th align="left" > : '.$_SESSION['niplg'].'</th>
</tr>
<tr>
  <th align="left" width="80">Nama</th>
  <th align="left"> : '.$_SESSION['Nama'].'</th>
</tr>
</table>
';

// $pdf->writeHTML($tbl, true, false, false, false, '');


$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

$tbl .= '
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


// $pdf->MultiCell(55, 5, $pdf->writeHTML($tbl, true, false, false, false, ''), 1, 'J', 1, 2, 125, 210, true);
// -----------------------------------------------------------------------------


$tbl .= '
<table>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>

</table>
';

// $pdf->writeHTML($tbl, true, false, false, false, '');

$tbl .= '
<table>
<tr>
  <th align="center">Setujui</th>
  <th align="center">Semarang, '.date("M Y").'</th>
</tr>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
<tr>
  <th align="center">Nama</th>
  <th align="center">'.$_SESSION['Nama'].'</th>
</tr>
</table>
<br pagebreak="true"/>
';

 $pdf->writeHTML($tbl, true, false, false, false, '');
// -----------------------------------------------------------------------------



      /// 2nd page




//=========================================================================
//Close and output PDF document


$tbl = <<<EOD
<table>
<tr>
  <th align="center">
  BON BARANG<br>
  OJK KR4 Jawa Tengah dan D.I Yogyakarta  <br>   
  </th>
</tr>
</table>
EOD;

// $pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

$tbl .= '

<table>
<tr>
  <th align="left" width="80">NIP</th>
  <th align="left" > : '.$_SESSION['niplg'].'</th>
</tr>
<tr>
  <th align="left" width="80">Nama</th>
  <th align="left"> : '.$_SESSION['Nama'].'</th>
</tr>
</table>
';

// $pdf->writeHTML($tbl, true, false, false, false, '');


$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

$tbl .= '
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


// $pdf->MultiCell(55, 5, $pdf->writeHTML($tbl, true, false, false, false, ''), 1, 'J', 1, 2, 125, 210, true);
// -----------------------------------------------------------------------------


$tbl .= '
<table>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>

</table>
';

// $pdf->writeHTML($tbl, true, false, false, false, '');

$tbl .= '
<table>
<tr>
  <th align="center">Setujui</th>
  <th align="center">Semarang, '.date("M Y").'</th>
</tr>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
<tr>
  <th align="center">Nama</th>
  <th align="center">'.$_SESSION['Nama'].'</th>
</tr>
</table>
';

 $pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output('Transaksi.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+