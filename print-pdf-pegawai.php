<?php
require('./fpdf/fpdf.php');

$pdf = new FPDF('L', 'mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(270, 7, 'YAYASAN DENTHA KASIH', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(270, 7, 'DAFTAR PEGAWAI YAYASAN DENTHA KASIH', 0, 1, 'C');

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(60, 8, 'Nama Pegawai', 1, 0, 'C');
$pdf->Cell(60, 8, 'Alamat', 1, 0, 'C');
$pdf->Cell(30, 8, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(30, 8, 'Agama', 1, 0, 'C');
$pdf->Cell(40, 8, 'Jabatan', 1, 0, 'C');
$pdf->Cell(40, 8, 'Email', 1, 1, 'C');


$pdf->SetFont('Arial', '', 10);
include 'config.php';
$sql = "SELECT * FROM pegawai";
$pegawai = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($pegawai)) {
    $pdf->Cell(60, 8, $row['nama'], 1, 0, 'C');
    $pdf->Cell(60, 8, $row['alamat'], 1, 0, 'C');
    $pdf->Cell(30, 8, $row['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(30, 8, $row['agama'], 1, 0, 'C');
    $pdf->Cell(40, 8, $row['jabatan'], 1, 0, 'C');
    $pdf->Cell(40, 8, $row['email'], 1, 1, 'C');
}

$pdf->Output();
