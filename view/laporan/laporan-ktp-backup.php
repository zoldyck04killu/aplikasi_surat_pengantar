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
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, True, 'UTF-8', false);

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
$pdf->Image('../../assets/image/LOGO_KABUPATEN_TABALONG.png', 15, 10, 20, 20, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);
$pdf->Image('../../assets/image/LOGO_KABUPATEN_TABALONG.png', 260, 10, 20, 20, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);
$html_header=<<<EOD
    <center>
      <h1> Laporan Surat Pengantar Kependudukan </h1>
      <h3>Pada Dinas Kependudukan dan Catatan Sipil Kabupaten Tabalong</h3>
      <h3>Laporan Permohonan KTP</h3>
    </center>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html_header, 0, 1, 0, true, 'C', true);

// $html=<<<EOD
//     <table border="1">
//       <tr align="center" style="font-weight: bold;">
//           <th width="50">No</th>
//           <th width="170">Nama</th>
//           <th>Tanggal Permohonan</th>
//           <th>Status</th>
//
//       </tr>
//     </table>
// EOD;
$nik = @$_GET['nik'];
$sql = $objAdmin->showKTP_perNik($nik);
$data = $sql->fetch_object();
  if ($data->status_cetak == 0) {
      $status_cetak = "Belum Cetak";
  }else{
    $status_cetak = "Sudah Cetak";
  }

$pdf->Ln(10);
$pdf->SetX(180);
$pdf->Cell(60,0, ' Tanggal Permohonan : '.$data->tanggal_permohonan, 0, 1, 'L', 0, '', 0);


$html2=<<<EOD
  <table cellpadding="4">
EOD;
$html5=<<<EOD
    </table>
EOD;
$pdf->Ln(15);

      // $pdf->SetX(2);
      $pdf->writeHTMLCell(0, 0,10 , '', $html2.
      '<tr><td width="200">NIK</td><td width="50">:</td><td>'.$data->nik.'</td></tr>
      <tr><td width="200">Nama</td><td width="50">:</td><td>'.$data->nama.'</td></tr>
      <tr><td width="200">Tanggal Lahir</td><td width="50">:</td><td>'.$data->tanggal_lahir.'</td></tr>
      <tr><td width="200">Tempat Lahir</td><td width="50">:</td><td>'.$data->tempat_lahir.'</td></tr>
      <tr><td width="200">Jenis Kelamin</td><td width="50">:</td><td>'.$data->jekel.'</td></tr>
      <tr><td width="200">Alamat</td><td width="50">:</td><td>'.$data->alamat.'</td></tr>
      <tr><td width="200">Rt</td><td width="50">:</td><td>'.$data->rt.'</td></tr>
      <tr><td width="200">Rw</td><td width="50">:</td><td>'.$data->rw.'</td></tr>
      <tr><td width="200">Agama</td><td width="50">:</td><td>'.$data->agama.'</td></tr>
      <tr><td width="200">Kewarganegaraan</td><td width="50">:</td><td>'.$data->kewarganegaraan.'</td></tr>
      '.$html5 , 0, 1, 0, true, '', true);
    $no++;




// $pdf->Ln(10);
// $pdf->SetX(230);
// $pdf->Cell(60,0, ' Mengetahui', 0, 1, 'L', 0, '', 0);
// $pdf->SetX(210);
// $pdf->Cell(60,0, ' Kepla Puskesmas Lepasan', 0, 1, 'L', 0, '', 0);
// $pdf->Ln(20);
// $pdf->SetX(228);
// $pdf->Cell(60,0, ' Nama Kepala', 0, 1, 'L', 0, '', 0);
// $pdf->SetX(231);
// $pdf->Cell(60,0, ' Nip Kepala', 0, 1, 'L', 0, '', 0);

ob_end_clean();
$pdf->Output('petugas.pdf', 'I');
