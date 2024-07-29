<?php

namespace App\Controllers;

use App\Models\ReservationRestoranModel;
use TCPDF;
use App\Libraries\CustomPDF;
use App\Models\Makomodasi;
use App\Models\Mrestoran;
use App\Models\Mdashboard;
use App\Models\Madmin;
use App\Models\Muser;

class PdfController extends BaseController
{
    public function reservasi_pdf($id)
    {
        // Data reservasi
        $this->reservasi_model = new ReservationRestoranModel();
        $this->restoran_model = new Mrestoran();

        $idrestoran = $this->restoran_model->get_company($id)->id_restoran;
        $reservations = $this->reservasi_model->getReservationsResto($idrestoran);

        if (empty($reservations)) {
            // Handle case where there are no reservations
            echo "Data for reservation is empty or missing!";
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


    public function komentar_penginapan_pdf($id)
    {
        // Data reservasi
        $this->akomodasi_model = new Makomodasi();
        $this->user_model = new Muser();

        $id_penginapan = $this->akomodasi_model->get_company($id)->id_penginapan;

        if (empty($id_penginapan)) {
            // Handle case where there are no reservations
            echo "id dari penginapan tidak ada!";
            return;
        }

        $komentar = $this->user_model->get_komentar_penginapan($id_penginapan, 'penginapan');

        if (empty($komentar)) {
            // Handle case where there are no reservations
            echo "Data komentar tidak ditemukan!";
            return;
        }
        // Load TCPDF library
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Komentar Penginapan');
        $pdf->SetSubject('Komentar Penginapan');
        $pdf->SetKeywords('Komentar, PDF, TCPDF');

        // Add a page
        $pdf->AddPage();

        // Set title
        $pdf->SetFont('times', 'B', 16);
        $pdf->Cell(0, 10, 'Komentar Penginapan', 0, 1, 'C');

        $pdf->Ln(6);
        // Set table headers
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Email', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Username', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Rating', 1, 0, 'C');
        $pdf->Cell(80, 10, 'Komentar', 1, 0, 'C');
        $pdf->Ln();

        // Set table content
        $pdf->SetFont('times', '', 12);
        $no = 1;
        foreach ($komentar as $kom) {
            $pdf->Cell(10, 10, $no++, 1, 0, 'C');
            $pdf->Cell(60, 10, $kom->email, 1, 0, 'C');
            $pdf->Cell(60, 10, $kom->username, 1, 0, 'C');
            $pdf->Cell(20, 10, $kom->rating, 1, 0, 'C');
            $pdf->Cell(80, 10, $kom->komen, 1, 0, 'L');
            $pdf->Ln();
        }

        // Output the PDF
        $pdf->Output('komentar_penginapan.pdf', 'D'); // 'D' for download, 'I' for inline display
    }

    public function admin_pdf()
    {
        // Data reservasi
        $this->dashboard_model = new Mdashboard();
        $this->admin_model = new Madmin();

        $data['objek'] = count($this->dashboard_model->getdata('objek_wisata'));
        $data['rekreasi'] = count($this->dashboard_model->getdata('rekreasi_wisata'));
        $data['akomodasi'] = count($this->dashboard_model->getdata('akomodasi_penginapan'));
        $data['restoran'] = count($this->dashboard_model->getdata('restoran'));

        $data['user'] = $this->admin_model->findAll();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die;
        if (empty($data)) {
            // Handle case where there are no reservations
            echo "Data komentar tidak ditemukan!";
            return;
        }
        // Load TCPDF library
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Laporan Data');
        $pdf->SetSubject('Laporan Data');
        $pdf->SetKeywords('Laporan, PDF, TCPDF');

        // Add a page
        $pdf->AddPage();

        // Set title for the first table
        $pdf->SetFont('times', 'B', 16);
        $pdf->Cell(0, 10, 'Total Data dari Tiap Menu/Fitur', 0, 1, 'C');
        $pdf->Ln(6);

        // Set table headers for the first table
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(60, 10, 'Menu/Fitur', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Total Data', 1, 0, 'C');
        $pdf->Ln();

        // Set table content for the first table
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(60, 10, 'Objek Wisata', 1, 0, 'C');
        $pdf->Cell(60, 10, $data['objek'], 1, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(60, 10, 'Rekreasi Wisata', 1, 0, 'C');
        $pdf->Cell(60, 10, $data['rekreasi'], 1, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(60, 10, 'Akomodasi Penginapan', 1, 0, 'C');
        $pdf->Cell(60, 10, $data['akomodasi'], 1, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(60, 10, 'Restoran', 1, 0, 'C');
        $pdf->Cell(60, 10, $data['restoran'], 1, 0, 'C');
        $pdf->Ln(12);

        // Set title for the second table
        $pdf->SetFont('times', 'B', 16);
        $pdf->Cell(0, 10, 'Data Pengguna', 0, 1, 'C');
        $pdf->Ln(6);

        // Set table headers for the second table
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(80, 10, 'Email', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Username', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Role', 1, 0, 'C');
        $pdf->Ln();

        // Set table content for the second table
        $pdf->SetFont('times', '', 12);
        foreach ($data['user'] as $user) {
            $pdf->Cell(80, 10, $user->email, 1, 0, 'C');
            $pdf->Cell(40, 10, $user->username, 1, 0, 'C');
            $pdf->Cell(40, 10, $user->role, 1, 0, 'C');
            $pdf->Ln();
        }

        // Output the PDF
        $pdf->Output('laporan_data.pdf', 'D'); // 'D' for download, 'I' for inline display
    }
}
