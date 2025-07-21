<?php
// File: app/Controllers/DonationController.php
namespace App\Controllers;

class DonationController extends BaseController
{
    public function index()
    {
        // Halaman donasi utama, bisa menampilkan daftar program untuk didonasikan
        $programController = new ProgramController();
        $data = [
            'title' => 'Donasi Sekarang',
            'programs' => $programController->getPrograms()
        ];
        // Untuk saat ini, kita bisa arahkan ke halaman daftar program saja
        return redirect()->to('/programs');
    }
    
    public function process()
    {
        // Validasi input dari form donasi
        $amount = $this->request->getPost('amount');
        $slug = $this->request->getPost('program_slug');

        if (!is_numeric($amount) || $amount < 10000 || empty($slug)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Jumlah donasi minimal adalah Rp 10.000 dan program harus dipilih.'
            ])->setStatusCode(400);
        }

        // Temukan data program yang sesuai
        $programController = new ProgramController();
        $programData = null;
        foreach($programController->getPrograms() as $p) {
            if ($p['slug'] === $slug) {
                $programData = $p;
                break;
            }
        }

        if (!$programData) {
             return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Program donasi tidak ditemukan.'
            ])->setStatusCode(404);
        }
        
        // Simulasi penambahan donasi menggunakan session
        // Ini hanya untuk demo, di dunia nyata, data akan masuk ke database
        $session = session();
        $donations = $session->get('simulated_donations') ?? [];
        
        if (!isset($donations[$slug])) {
            $donations[$slug] = 0;
        }
        $donations[$slug] += (int)$amount;
        $session->set('simulated_donations', $donations);

        // Hitung total donasi baru (donasi asli + donasi simulasi dari session)
        $newTotalDonation = $programData['current_donation'] + $donations[$slug];

        // Kirim response sukses ke JavaScript
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Donasi Anda sebesar Rp ' . number_format($amount, 0, ',', '.') . ' telah diterima. Terima kasih atas kebaikan Anda!',
            'new_total' => $newTotalDonation,
            'target' => $programData['target'],
            'program_title' => $programData['title']
        ]);
    }
}
