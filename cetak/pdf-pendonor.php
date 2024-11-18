<?php

include "../fpdf186/fpdf.php";
include "../koneksi.php";

$pdf = new FPDF('P', 'mm', array(210, 297));
$pdf-> AddPage();

$pdf->SetFont('Times', 'B',14);

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$startDateObj = new DateTime($start_date);
$endDateObj = new DateTime($end_date);
$monthName = $startDateObj->format('F'); // Nama bulan dari tanggal awal

$pdf->Cell(0,5,'DAFTAR PENDONOR DARAH UNIT TRANSFUSI DARAH','0','1','C',false);
$pdf->Cell(0,10,'RSUD ULIN BANJARMASIN', '0', '1', 'C', false);
$pdf->Cell(0,5,'BULAN '. strtoupper($monthName) . ' ' . $startDateObj->format('Y'), '0', '1', 'C', false);
$pdf->Ln(5);



$pdf->SetFont('Times','B',12);
$pdf->Cell(10,12,'NO',1,0,'C');
$pdf->Cell(45,12,'TANGGAL',1,0,'C');
$pdf->Cell(45,12,'NAMA PENDONOR',1,0,'C');
$pdf->Cell(45,12,'GOLONGAN DARAH',1,0,'C');
$pdf->Cell(45,12,'KATEGORI DONOR',1,0,'C');
$pdf->Ln(7);
$no = 0;

// Ambil tanggal dari parameter GET
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Buat query untuk mengambil data pendonor dengan filter
$query = "SELECT * FROM pendonor";
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
    $pdf->Cell(45, 5, $data['tanggal'], 1, 0, 'L');
    $pdf->Cell(45, 5, $data['nama'], 1, 0, 'L');
    $pdf->Cell(45, 5, $data['gol_darah'], 1, 0, 'C');
    $pdf->Cell(45, 5, $data['kategori_donor'], 1, 0, 'C');
}

$pdf->Ln(10); // Add space before the signature

$pdf->SetFont('Times', '', 12);
$pdf->Cell(0, 5, 'Catatan :', 0, 1, 'L');
$pdf->Cell(0, 5, '1 orang pendonor diberi 1 pcs Pop Mie besar dan 1 kotak susu Frisian Flag 200 ml.', 0, 1, 'L');

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