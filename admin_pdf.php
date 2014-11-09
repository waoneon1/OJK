<?php include("login.php"); ?>
<?php

require_once('tcpdf/tcpdf.php');

// create new PDF document
$page_format = array(
    'MediaBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 210, 'ury' => 297),
    //'CropBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 210, 'ury' => 297),
    //'BleedBox' => array ('llx' => 5, 'lly' => 5, 'urx' => 205, 'ury' => 292),
    //'TrimBox' => array ('llx' => 10, 'lly' => 10, 'urx' => 200, 'ury' => 287),
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
$pdf = new TCPDF("P", PDF_UNIT, /*PDF_PAGE_FORMAT*/$page_format , true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('waoneon1');
$pdf->SetTitle('Pdf Transaksi');
$pdf->SetSubject('');
$pdf->SetKeywords('TCPDF, PDF');

// set default header data


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 12);

// -----------------------------------------------------------------------------
include("database.php"); 
  $database = new database;
  $con = $database->db_connect();
  
  $pross = "  SELECT * 
      FROM tb_barang 
      ";

  $result = mysqli_query($con, $pross);   
  
  while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {    
    $row[] = $data;
  } 

$tbl =  '
<table border="1">
<tr>
  <th align="center" width="30">No</th>
  <th align="center" width="70">Kode Barang</th>
  <th align="center" width="400">Nama Barang</th>
  <th align="center" width="60">Stok</th>
  <th align="center" width="80">Keterangan</th>
</tr>
';

foreach ( $row as $key => $value) {
  $tbl .=  '
    <tr>
      <th align="center">'.$value['No'].'</th>
      <th align="center">'.$value['Kode_Barang'].'</th>
      <th align="left"> '.$value['Jenis_Barang'].'</th>
      <th align="center">'.$value['Stok_Barang'].'</th>
      <th align="left"> '.$value['Keterangan'].'</th>
    </tr>
    ';
}

$tbl .=  '
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');
// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Transaksi.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+