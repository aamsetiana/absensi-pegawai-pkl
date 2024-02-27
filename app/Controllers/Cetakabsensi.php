<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use Dompdf\Dompdf;

class Cetakabsensi extends BaseController
{
    public function printPDF()
    {
        // Load library Dompdf
        $dompdf = new Dompdf();

        // Data untuk ditampilkan dalam PDF
        $data = [
            'title' => 'Rekap Data Absensi',
            'listAbsensi' => $this->absensi->getAbsensi()
        ];

        // Load view yang akan dijadikan konten PDF
        $html = view('cetak/pdf_template', $data);

        // Konversi HTML menjadi format PDF
        $dompdf->loadHtml($html);

        // Atur konfigurasi sesuai kebutuhan
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Tampilkan atau unduh file PDF
        $dompdf->stream('rekap_data_absensi', ['Attachment' => 0]);
    }
}
