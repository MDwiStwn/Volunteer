<?php 
// File: app/Controllers/Home.php
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Buat instance dari ProgramController untuk mengambil data program
        $programController = new ProgramController();
        
        // Ambil 3 program pertama untuk ditampilkan sebagai program unggulan
        $featuredPrograms = array_slice($programController->getPrograms(), 0, 3);

        $data = [
            'title' => 'Beranda | Organisasi Peduli',
            'programs' => $featuredPrograms
        ];
        
        return view('pages/home', $data);
    }

    /**
     * Metode baru untuk menampilkan halaman 404.
     * Ini adalah cara yang lebih andal daripada menggunakan closure di file rute.
     */
    public function show404()
    {
        $data = ['title' => '404 - Halaman Tidak Ditemukan'];
        // Mengatur status HTTP header ke 404
        $this->response->setStatusCode(404);
        return view('pages/404', $data);
    }
}