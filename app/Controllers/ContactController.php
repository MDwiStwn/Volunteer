<?php
// File: app/Controllers/ContactController.php
// TIDAK ADA PERUBAHAN DI FILE INI
namespace App\Controllers;

class ContactController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    
    public function index()
    {
        $data = [
            'title' => 'Hubungi Kami'
        ];
        return view('pages/contact', $data);
    }

    public function submitContact()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'message' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validasi gagal, mohon periksa kembali input Anda.',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        // Kirim email ke admin
        $emailService = \Config\Services::email();
        $emailService->setFrom($email, $name);
        $emailService->setTo('admin@domainanda.com'); // <-- ganti dengan email tujuan
        $emailService->setSubject('Pesan Baru dari Website');
        $emailService->setMessage($message);

        if ($emailService->send()) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Terima kasih! Pesan Anda berhasil dikirim ke admin.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal mengirim email. Coba lagi nanti.'
            ])->setStatusCode(500);
        }
    }
}