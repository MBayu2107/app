<?php

include "../fpdf186/fpdf.php";
include "../koneksi.php";

$pdf = new FPDF('L', 'mm', array(215, 330));
$pdf-> AddPage();

$pdf->SetFont('Times', 'B',14);

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$startDateObj = new DateTime($start_date);
$endDateObj = new DateTime($end_date);
$monthName = $startDateObj->format('F'); // Nama bulan dari tanggal awal

$pdf->Cell(0,5,'BAKHP DAN REEAGENSIA','0','1','C',false);
$pdf->Cell(0,5,'BULAN '. strtoupper($monthName) . ' ' . $startDateObj->format('Y'), '0', '1', 'C', false);
$pdf->Ln(5);



$pdf->SetFont('Times','B',12);
$pdf->Cell(10,16,'No',1,0,'C');
$pdf->Cell(22,16,'Tanggal',1,0,'C');
$pdf->Cell(55,16,'Principal',1,0,'C');
$pdf->Cell(55,16,'Nama Barang',1,0,'C');
$pdf->Cell(25,16,'Merk',1,0,'C');
$pdf->Cell(25,16,'Satuan',1,0,'C');
$pdf->Cell(21,8,'Stok Awal',1,0,'C');
$pdf->Cell(21,8,'Masuk',1,0,'C');
$pdf->Cell(21,8,'Keluar',1,0,'C');
$pdf->Cell(21,8,'Stok Akhir',1,0,'C');
$pdf->Cell(35,16,'Permintaan',1,0,'C');
$pdf->Ln(8);

$pdf->Cell(10,8,'',0,0,'C');
$pdf->Cell(22,8,'',0,0,'C');
$pdf->Cell(55,8,'',0,0,'C');
$pdf->Cell(55,8,'',0,0,'C');
$pdf->Cell(25,8,'',0,0,'C');
$pdf->Cell(25,8,'',0,0,'C');
$pdf->Cell(84,8,'Stok Opname',1,0,'C');
$pdf->Cell(35,8,'',0,0,'C');
$pdf->Ln(3);

$no = 0;

// Ambil tanggal dari parameter GET
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Buat query untuk mengambil data pendonor dengan filter
$query = "SELECT * FROM farmasi";
if ($start_date && $end_date) {
    $query .= " WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
}
$tampil = mysqli_query($koneksi, $query);

// Menampilkan data ke PDF
while ($data = mysqli_fetch_array($tampil)) {
    $no++;
    $pdf->Ln(5);
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(10, 5, $no, 1, 0, 'C');
    $pdf->Cell(22, 5, $data['tanggal'], 1, 0, 'L');
    $pdf->Cell(55, 5, $data['principal'], 1, 0, 'L');
    $pdf->Cell(55, 5, $data['nama_barang'], 1, 0, 'C');
    $pdf->Cell(25, 5, $data['merk'], 1, 0, 'C');
    $pdf->Cell(25, 5, $data['satuan'], 1, 0, 'C');
    $pdf->Cell(21, 5, $data['stok_awal'], 1, 0, 'C');
    $pdf->Cell(21, 5, $data['masuk'], 1, 0, 'C');
    $pdf->Cell(21, 5, $data['keluar'], 1, 0, 'C');
    $pdf->Cell(21, 5, $data['stok_akhir'], 1, 0, 'C');
    $pdf->Cell(35, 5, $data['permintaan'], 1, 0, 'C');
}

$pdf->Ln(10); // Add space before the signature

$pdf->SetFont('Times', '', 12);
$pdf->Cell(0, 5, 'Kepala Ruangan Instalasi UTD', 0, 1, 'R');
$pdf->Cell(0, 5, 'RSUD Ulin Banjarmasin', 0, 1, 'R');

$pdf->Ln(15); // Additional space for visual clarity
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, 'Sri Normayani, A.Md AK, SKM', 0, 1, 'R'); // Current date
$pdf->SetFont('Times', '', 12);
$pdf->Cell(0, 5, 'NIP. 19730723 199311 2 001', 0, 1, 'R'); // Current date

$pdf->Output('I', 'Laporan Kegiatan UTDRS ' . $startDateObj->format('Y-m-d') . ' sampai ' . $endDateObj->format('Y-m-d') . '.pdf');

?>