<?php
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

// Include the main TCPDF library (search for installation path).

require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 048');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data


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

$pdf->SetFont('helvetica', '', 15);

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

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->SetFont('helvetica', '', 13);

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

$tbl = '
<table>
<tr>
  <th align="left" width="80">NIP</th>
  <th align="left" > : '.$_POST['nip'].'</th>
</tr>
<tr>
  <th align="left" width="80">Nama</th>
  <th align="left"> : '.$_POST['nama'].'</th>
</tr>
</table>
';

$pdf->writeHTML($tbl, true, false, false, false, '');


$pdf->SetFont('helvetica', '', 13);

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

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
foreach ($_POST['kodeP'] as $key => $value) {
if ($_POST['stat'][$i] == '1') {
  $tbl .= '
    <tr>
      <th align="center">'.$no.'</th>
      <th align="center">'.$value.'</th>
      <th align="center">'.$_POST['namaP'][$i].'</th>
      <th align="center">'.$_POST['jmlP'][$i].'</th>
      <th align="center">'.$_POST['ketP'][$i].'</th>
    </tr>
    ';
$no++;
}
$i++;
}

$tbl .='
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------


$tbl = '
<table>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
<tr>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
</table>
';

$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = '
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
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
<tr>
  <th align="center">Nama</th>
  <th align="center">'.$_POST['nama'].'</th>
</tr>
</table>
';

$pdf->writeHTML($tbl, true, false, false, false, '');
// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Transaksi.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+