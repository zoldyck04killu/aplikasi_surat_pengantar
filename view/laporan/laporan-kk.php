<?php
require_once '../../config/autoload.php';
require_once '../../config/config.php';
require_once '../../config/connection.php';
include('../../models/admin.php');

$obj = new Connection($host, $user, $pass, $db);
$objAdmin = new Admin($obj);

ob_start();
define('K_PATH_IMAGES', '../../assets/image/');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, True, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set scaling image
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// font subsetting
// $pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 14, '', true);

$pdf->AddPage();

// $pdf->Ln(0);
// $pdf->SetX(210);
// $pdf->Cell(60,0, 'Tempat Posyandu, '.date("d-m-Y"), 0, 1, 'L', 0, '', 0); // untuk tanggal

// $pdf->writeHTMLCell(0, 0, '', '', '<H2>NOTA PEMBELIAN</H2>' , 0, 2, 0, true, 'C', true);
// Image method signature:
// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

$nik = @$_GET['nik'];
$data = $objAdmin->editKK($nik)->fetch_object();

$pdf->Image('../../assets/image/LOGO_KABUPATEN_TABALONG.png', 2, 7, 20, 20, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);
$pdf->Image('../../assets/image/LOGO_KABUPATEN_TABALONG.png', 187, 7, 20, 20, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);

$pdf->writeHTMLCell(0, 0, '', '', '<center><h2>PEMERINTAH DESA '.$data->desa.'  <br>   RT  '.$data->rt.' RW  '.$data->rw.' <br>Desa '.$data->desa.' Kecamatan '.$data->kec.' Kabupaten '.$data->kab.'<h2></center>', 0, 1, 0, true, 'C', true);
// $pdf->Ln(3);
$pdf->writeHTMLCell(0, 0, '', '', "<hr>", 0, 1, 0, true, 'C', true);


// $pdf->Ln(5);
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0,10 ,'', '<b><u>SURAT PENGANTAR KARTU KELUARGA</u> <br> No.  ..................................</b>' , 0, 1, 0, true, 'C', true);

$pdf->Ln(2);
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0,10 ,'', 'Yang bersangkutan di bawah ini warga RT  '.$data->rt.' RW  '.$data->rw.' Desa '.$data->desa.'
Kecamatan '.$data->kec.' Kabupaten '.$data->kab.' dengan ini menerangkan bahwa : ' , 0, 1, 0, true, '', true);

$html2=<<<EOD
  <table cellpadding="4">
EOD;
$html5=<<<EOD
    </table>
EOD;

  $pdf->Ln(2);
  $pdf->SetX(100);
  $pdf->writeHTMLCell(0, 0,30 , '', $html2.
   
  '<tr><td width="200">Nama</td><td width="50">:</td><td> '.$data->nama.' </td></tr>
  <tr><td width="200">Tanggal Lahir</td><td width="50">:</td><td> '.$data->tanggal_lahir.' </td></tr>
  <tr><td width="200">Tempat Lahir</td><td width="50">:</td><td> '.$data->tempat_lahir.' </td></tr>
  <tr><td width="200">Jenis Kelamin</td><td width="50">:</td><td> '.$data->jekel.' </td></tr>
  <tr><td width="200">Alamat</td><td width="50">:</td><td> '.$data->alamat.' </td></tr>
  <tr><td width="200">Rt</td><td width="50">:</td><td> '.$data->rt.' </td></tr>
  <tr><td width="200">Rw</td><td width="50">:</td><td> '.$data->rw.' </td></tr>
  <tr><td width="200">Agama</td><td width="50">:</td><td> '.$data->agama.' </td></tr>
  <tr><td width="200">Kewarganegaraan</td><td width="50">:</td><td> '.$data->kewarganegaraan.' </td></tr>
  <tr><td width="200">Tanggal Pengambilan</td><td width="50">:</td><td> '.$data->tgl_pengambilan.' </td></tr>
  '.$html5 , 0, 1, 0, true, '', true);

  $pdf->Ln(5);
  $pdf->SetX(10);
  $pdf->writeHTMLCell(0, 0,10 ,'', 'Orang tersebut diatas, adalah benar - benar warga RT  '.$data->rt. ' RW '.$data->rw.'
  Desa '.$data->desa.' Kecamatan '.$data->kec.' Kabupaten '.$data->kab.' Surat pengantar ini dibuat sebagai kelengkapan pengurusan
 KK (Kartu Keluarga).' , 0, 1, 0, true, '', true);

  $pdf->Ln(2);
  $pdf->SetX(10);
  $pdf->writeHTMLCell(0, 0,10 ,'', 'Demikian surat pengantar ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.' , 0, 1, 0, true, '', true);

// $pdf->Ln(2);
// $pdf->SetX(130);
// $date_permohonan = date('d-m-Y');
// $pdf->Cell(60,0,$data->kec.'. '.$date_permohonan.', ', 0, 1, 'L', 0, '', 0);
// $pdf->SetX(130);
// $pdf->Cell(60,0, ' Ketua RT, '.$data->rt.' RW, '.$data->rw, 0, 1, 'L', 0, '', 0);
// $pdf->Ln(15);
// $pdf->SetX(134);
// $pdf->Cell(60,0, $data->nama_ket_rt, 0, 1, 'L', 0, '', 0);
// $pdf->SetX(133);
// $pdf->Cell(60,0, ' Nip: '.$data->nip_ket_rt, 0, 1, 'L', 0, '', 0);

ob_end_clean();
$pdf->Output('petugas.pdf', 'I');
