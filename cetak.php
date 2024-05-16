<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 10, 'KONSERKU.ID', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Tiket Konser', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 10, '', 0, 1);

// Header
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255); // Header background color
$pdf->Cell(50, 8, 'Nama', 1, 0, 'C', true);
$pdf->Cell(50, 8, 'Alamat', 1, 0, 'C', true);
$pdf->Cell(25, 8, 'NIK', 1, 0, 'C', true);
$pdf->Cell(20, 8, 'Jumlah', 1, 0, 'C', true);
$pdf->Cell(20, 8, 'Konser', 1, 0, 'C', true);
$pdf->Cell(20, 8, 'Kategori', 1, 1, 'C', true);

// Data
$pdf->SetFont('Arial', '', 10);
$fill = false; // Alternate row fill color

// Include 'koneksi.php' to establish a database connection
include 'koneksi.php';

// Fetch data from the database
$tiket = mysqli_query($conn, "select * from tikett");

while ($row = mysqli_fetch_array($tiket)) {
    $pdf->Cell(50, 8, $row['nama'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 8, $row['alamat'], 1, 0, 'C', $fill);
    $pdf->Cell(25, 8, $row['nik'], 1, 0, 'C', $fill);
    $pdf->Cell(20, 8, $row['jumlah'], 1, 0, 'C', $fill);
    $pdf->Cell(20, 8, $row['konser'], 1, 0, 'C', $fill);
    $pdf->Cell(20, 8, $row['kategori'], 1, 1, 'C', $fill);
    $fill = !$fill; // Toggle row fill color
}

// Output the PDF to the browser
$pdf->Output('I', 'Tiket_Konser.pdf'); // D for display, Tiket_Konser.pdf is the suggested file name
?>
