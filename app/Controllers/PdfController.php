<?php

namespace App\Controllers;

use App\Models\ReservationRestoranModel;
use TCPDF;
use App\Libraries\CustomPDF;

class PdfController extends BaseController
{
    public function reservasi_pdf($id)
    {
        // Data reservasi
        $this->reservasi_model = new ReservationRestoranModel();
        $reservations = $this->reservasi_model->getReservationsResto($id);

        if (empty($reservations)) {
            // Handle case where there are no reservations
            return;
        }
        $namaRestoran = $reservations[0]['nama_restoran'];

        // Load TCPDF library
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Atur informasi dokumen
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Data Reservasi');
        $pdf->SetSubject('Data Reservasi');
        $pdf->SetKeywords('Reservasi, PDF, TCPDF');

        // Tambahkan halaman
        $pdf->AddPage();

        // Tambahkan judul
        $pdf->SetFont('times', 'B', 16);
        $pdf->Cell(0, 10, 'Data Reservasi Restoran ' . $namaRestoran, 0, 1, 'C');

        $pdf->Ln(6);
        // Tambahkan konten data
        $pdf->SetFont('times', '', 12);

        // Header tabel
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(30, 10, 'Nama', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Jam', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Jumlah Orang', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Nomor Telepon', 1, 0, 'C');
        $pdf->Cell(30, 10, 'jenis bayar', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Catatan', 1, 0, 'C');
        $pdf->Ln();

        // Data tabel
        $pdf->SetFont('times', '', 12);
        foreach ($reservations as $reservation) {
            // Get the heights of each cell
            $cellHeights = [];
            $cellHeights[] = $pdf->getStringHeight(30, $reservation['nama']);
            $cellHeights[] = $pdf->getStringHeight(30, date_format(date_create($reservation['tanggal']), 'd-M-Y'));
            $cellHeights[] = $pdf->getStringHeight(30, date_format(date_create($reservation['jam']), 'H:i'));
            $cellHeights[] = $pdf->getStringHeight(30, $reservation['jumlahorang']);
            $cellHeights[] = $pdf->getStringHeight(50, $reservation['nomortelepon']);
            $cellHeights[] = $pdf->getStringHeight(30, $reservation['payment_type']);
            $cellHeights[] = $pdf->getStringHeight(50, $reservation['catatan']);

            // Get the max height of the row
            $maxHeight = max($cellHeights) + 10;

            // Output the cells with the max height
            $pdf->MultiCell(30, $maxHeight, $reservation['nama'], 1, 'C', 0, 0);
            $pdf->MultiCell(30, $maxHeight, date_format(date_create($reservation['tanggal']), 'd-M-Y'), 1, 'C', 0, 0);
            $pdf->MultiCell(30, $maxHeight, date_format(date_create($reservation['jam']), 'H:i'), 1, 'C', 0, 0);
            $pdf->MultiCell(30, $maxHeight, $reservation['jumlahorang'], 1, 'C', 0, 0);
            $pdf->MultiCell(50, $maxHeight, $reservation['nomortelepon'], 1, 'C', 0, 0);
            $pdf->MultiCell(30, $maxHeight, $reservation['payment_type'], 1, 'C', 0, 0);
            $pdf->MultiCell(50, $maxHeight, $reservation['catatan'], 1, 'L', 0, 1);
        }

        // Tampilkan output PDF
        $pdf->Output('data_reservasi.pdf', 'D'); // 'D' untuk download, 'I' untuk tampilan di browser
    }
}
