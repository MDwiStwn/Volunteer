<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Home extends BaseController
{
    /**
     * Inisialisasi properti kontroler.
     * Digunakan untuk memuat helper atau layanan yang diperlukan.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // Memuat URL Helper untuk fungsi base_url() dan site_url()
        helper('url');
        // Memuat session helper untuk flashdata
        helper('session');
    }

    /**
     * Metode default untuk menampilkan halaman beranda.
     * Memuat tampilan 'pages/index'.
     */
    public function index()
    {
        // Mendapatkan pesan flashdata (jika ada) dari submitContact
        $data = [
            'success_message' => session()->getFlashdata('success'),
            'error_message' => session()->getFlashdata('error'),
            'validation_errors' => session()->getFlashdata('validation')
        ];

        // Menampilkan tampilan utama
        return view('pages/index', $data);
    }

    /**
     * Menangani pengiriman formulir kontak.
     * Melakukan validasi data formulir dan merespons dengan JSON.
     */
    public function submitContact()
    {
        // Memuat layanan validasi
        $validation = \Config\Services::validation();

        // Menetapkan aturan validasi
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'message' => 'required'
        ];

        // Menetapkan pesan kesalahan kustom (opsional)
        $messages = [
            'name' => [
                'required' => 'Nama Anda wajib diisi.'
            ],
            'email' => [
                'required' => 'Email Anda wajib diisi.',
                'valid_email' => 'Mohon masukkan alamat email yang valid.'
            ],
            'message' => [
                'required' => 'Pesan Anda wajib diisi.'
            ]
        ];

        // Memvalidasi data yang dikirimkan
        if ($this->validate($rules, $messages)) {
            // Formulir valid, proses data (misalnya, simpan ke database, kirim email)
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $message = $this->request->getPost('message');

            // Contoh: Mencatat data (dalam aplikasi nyata, Anda akan menyimpannya atau mengirim email)
            log_message('info', "Pengiriman Formulir Kontak: Nama - {$name}, Email - {$email}, Pesan - {$message}");

            // Mengatur pesan sukses untuk respons AJAX
            $response = [
                'status' => 'success',
                'message' => 'Terima kasih! Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.'
            ];
            return $this->response->setJSON($response);

        } else {
            // Formulir tidak valid, dapatkan kesalahan validasi
            $errors = $this->validator->getErrors();

            // Mengatur pesan kesalahan untuk respons AJAX
            $response = [
                'status' => 'error',
                'message' => 'Ada kesalahan dalam pengisian formulir. Mohon periksa kembali.',
                'errors' => $errors
            ];
            return $this->response->setJSON($response);
        }
    }
}
