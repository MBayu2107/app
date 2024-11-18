<?php

include "../fpdf186/fpdf.php";
include "../koneksi.php";

$pdf = new FPDF('L', 'mm', array(215, 330));
$pdf-> AddPage('');

$pdf->SetFont('Times', 'B',14);
// Ambil dan format tanggal
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$startDateObj = new DateTime($start_date);
$endDateObj = new DateTime($end_date);
$monthName = $startDateObj->format('F'); // Nama bulan dari tanggal awal

$pdf->Cell(0, 5, 'LAPORAN KEGIATAN INSTALASI UTDRS ULIN BANJARMASIN', '0', '1', 'C', false);
$pdf->Ln(2);
$pdf->Cell(0, 5, 'BULAN ' . strtoupper($monthName) . ' ' . $startDateObj->format('Y'), '0', '1', 'C', false);
$pdf->Ln(3);



$pdf->SetFont('Arial','B',10);
$pdf->Cell(22,16,'TANGGAL',1,0,'C');
$pdf->Cell(33,16,'JUMLAH PASIEN',1,0,'C');
$pdf->Cell(32,8,'JENIS KELAMIN',1,0,'C');
$pdf->Cell(28,8,'JENIS DARAH',1,0,'C');
$pdf->Cell(40,8,'CROSSMATCH',1,0,'C');
$pdf->Cell(28,16,'JUMLAH',1,0,'C');
$pdf->Cell(26,16,'PHLEBOTOMY',1,0,'C');
$pdf->Cell(22,16,'APHERESIS',1,0,'C');
$pdf->Cell(25,16,'COOMBS TES',1,0,'C');
$pdf->Cell(24,16,'GOL. DARAH',1,0,'C');
$pdf->Cell(28,16,'TOTAL',1,0,'C');
$pdf->Ln(8);

$pdf->Cell(22,8,'',0,0,'C');
$pdf->Cell(33,8,'',0,0,'C');
$pdf->Cell(16,8,'L',1,0,'C');
$pdf->Cell(16,8,'P',1,0,'C');
$pdf->Cell(14,8,'WB',1,0,'C');
$pdf->Cell(14,8,'PRC',1,0,'C');
$pdf->Cell(10,8,'A',1,0,'C');
$pdf->Cell(10,8,'B',1,0,'C');
$pdf->Cell(10,8,'AB',1,0,'C');
$pdf->Cell(10,8,'O',1,0,'C');
$pdf->Cell(28,8,'CROSSMATCH',0,0,'C');
$pdf->Cell(26,8,'',0,0,'C');
$pdf->Cell(22,8,'',0,0,'C');
$pdf->Cell(25,8,'',0,0,'C');
$pdf->Cell(24,8,'',0,0,'C');
$pdf->Cell(28,8,'PEMERIKSAAN',0,0,'C');
$pdf->Ln(3);

$no = 0;
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$query = "SELECT *, 
            (jumlah_crossmatch + phlebotomy + apheresis + coomb_tes + gol_darah) AS total
          FROM laporan_kegiatan";

if ($start_date && $end_date) {
    $query .= " WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
}

$tampil = mysqli_query($koneksi, $query);

$total_jumlah_pasien = 0;
$total_laki = 0;
$total_wanita = 0;
$total_wb = 0;
$total_prc = 0;
$total_a = 0;
$total_b = 0;
$total_ab = 0;
$total_o = 0;
$total_jmlh_crossmatch = 0;
$total_phlebotomy = 0;
$total_apheresis = 0;
$total_coomb_tes = 0;
$total_gol_darah = 0;
$grand_total = 0;

while($data = mysqli_fetch_array($tampil)) {
    $no++;
    $pdf->Ln(5);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(22,5,$data['tanggal'],1,0,'C');
    $pdf->Cell(33,5,$data['jumlah_pasien'],1,0,'C');
    $pdf->Cell(16,5,$data['laki'],1,0,'C');
    $pdf->Cell(16,5,$data['wanita'],1,0,'C');
    $pdf->Cell(14,5,$data['wb'],1,0,'C');
    $pdf->Cell(14,5,$data['prc'],1,0,'C');
    $pdf->Cell(10,5,$data['a'],1,0,'C');
    $pdf->Cell(10,5,$data['b'],1,0,'C');
    $pdf->Cell(10,5,$data['ab'],1,0,'C');
    $pdf->Cell(10,5,$data['o'],1,0,'C');
    $pdf->Cell(28,5,$data['jumlah_crossmatch'],1,0,'C');
    $pdf->Cell(26,5,$data['phlebotomy'],1,0,'C');
    $pdf->Cell(22,5,$data['apheresis'],1,0,'C');
    $pdf->Cell(25,5,$data['coomb_tes'],1,0,'C');
    $pdf->Cell(24,5,$data['gol_darah'],1,0,'C');
    $pdf->Cell(28,5,$data['total'],1,0,'C');

    $total_jumlah_pasien += $data['total_pasien'];
    $total_laki += $data['total_laki'];
    $total_wanita += $data['total_wanita'];
    $total_wb += $data['total_wb'];
    $total_prc += $data['total_prc'];
    $total_a += $data['total_a'];
    $total_b += $data['total_b'];
    $total_ab += $data['total_ab'];
    $total_o += $data['total_o'];
    $total_jmlh_crossmatch += $data['total_jmlh_crossmatch'];
    $total_phlebotomy += $data['total_phlebotomy'];
    $total_apheresis += $data['total_apheresis'];
    $total_coomb_tes += $data['total_coomb_tes'];
    $total_gol_darah += $data['total_gol_darah'];
    $grand_total += $data['grand_total'];
}

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(22, 5, 'Total', 1, 0, 'C');
$pdf->Cell(33, 5, $total_jumlah_pasien, 1, 0, 'C');
$pdf->Cell(16, 5, $total_laki, 1, 0, 'C');
$pdf->Cell(16, 5, $total_wanita, 1, 0, 'C');
$pdf->Cell(14, 5, $total_wb, 1, 0, 'C'); // WB
$pdf->Cell(14, 5, $total_prc, 1, 0, 'C'); // PRC
$pdf->Cell(10, 5, $total_a, 1, 0, 'C'); // A
$pdf->Cell(10, 5, $total_b, 1, 0, 'C'); // B
$pdf->Cell(10, 5, $total_ab, 1, 0, 'C'); // AB
$pdf->Cell(10, 5, $total_o, 1, 0, 'C'); // O
$pdf->Cell(28, 5, $total_jmlh_crossmatch, 1, 0, 'C');
$pdf->Cell(26, 5, $total_phlebotomy, 1, 0, 'C');
$pdf->Cell(22, 5, $total_apheresis, 1, 0, 'C');
$pdf->Cell(25, 5, $total_coomb_tes, 1, 0, 'C');
$pdf->Cell(24, 5, $total_gol_darah, 1, 0, 'C');
$pdf->Cell(28, 5, $grand_total, 1, 0, 'C');

$pdf->Ln(10); // Add space before the signature

// Set font for the signature section
$pdf->SetFont('Times', '', 12);
$pdf->Cell(0, 5, 'Kepala Ruangan Instalasi UTDRS', 0, 1, 'R');

$pdf->Ln(15); // Additional space for visual clarity
$pdf->Cell(0, 5, 'Sri Normayani, A.Md AK, SKM', 0, 1, 'R'); // Current date
$pdf->Cell(0, 5, 'NIP. 19730723 199311 2 001', 0, 1, 'R'); // Current date

$pdf->Output('I', 'Laporan Kegiatan UTDRS ' . $startDateObj->format('Y-m-d') . ' sampai ' . $endDateObj->format('Y-m-d') . '.pdf');


?>