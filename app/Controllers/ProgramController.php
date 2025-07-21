<?php
// File: app/Controllers/ProgramController.php
namespace App\Controllers;

class ProgramController extends BaseController
{
    private $programs;

    public function __construct()
    {
        // Simulasi data program dengan gambar lokal
        $this->programs = [
            [
                'slug' => 'bantu-pendidikan-anak-pedalaman',
                'title' => 'Bantu Pendidikan Anak Pedalaman',
                'short_description' => 'Sediakan akses pendidikan layak untuk anak-anak di daerah terpencil agar mereka bisa meraih mimpi.',
                'full_description' => 'Program ini bertujuan untuk membangun sekolah darurat, menyediakan buku-buku, seragam, dan mengirim guru sukarelawan ke desa-desa terpencil yang belum terjangkau akses pendidikan formal. Setiap donasi Anda akan menjadi bata untuk membangun masa depan mereka.',
                'image' => 'program-1.jpg', // Gambar lokal
                'target' => 100000000,
                'current_donation' => 75500000,
            ],
            [
                'slug' => 'tanam-pohon-untuk-masa-depan',
                'title' => 'Tanam Pohon untuk Masa Depan',
                'short_description' => 'Hijaukan kembali hutan Indonesia demi udara bersih, keseimbangan alam, dan pencegahan bencana.',
                'full_description' => 'Bergabunglah dalam gerakan menanam 1 juta pohon di lahan kritis. Program ini tidak hanya membantu mengurangi emisi karbon, tetapi juga menjaga habitat satwa liar, mencegah longsor, dan menjaga sumber air bagi masyarakat sekitar. Satu pohon dari Anda adalah harapan untuk bumi.',
                'image' => 'program-2.jpg', // Gambar lokal
                'target' => 50000000,
                'current_donation' => 23000000,
            ],
            [
                'slug' => 'air-bersih-untuk-semua',
                'title' => 'Air Bersih untuk Semua',
                'short_description' => 'Bangun sumur dan fasilitas air bersih di wilayah yang mengalami kekeringan dan krisis air.',
                'full_description' => 'Banyak saudara kita di berbagai wilayah Indonesia kesulitan mendapatkan akses air bersih yang layak. Program ini berfokus pada pembangunan sumur bor, instalasi pipa, dan edukasi sanitasi untuk memastikan masyarakat dapat hidup lebih sehat dan produktif.',
                'image' => 'program-3.jpg', // Gambar lokal
                'target' => 75000000,
                'current_donation' => 61000000,
            ],
            [
                'slug' => 'dukungan-kesehatan-lansia',
                'title' => 'Dukungan Kesehatan Lansia',
                'short_description' => 'Berikan layanan kesehatan dan pendampingan untuk para lansia dhuafa di panti atau rumah mereka.',
                'full_description' => 'Program ini menyediakan pemeriksaan kesehatan rutin, bantuan gizi, alat bantu (seperti kacamata atau tongkat), dan pendampingan sosial bagi para lansia yang hidup sebatang kara dan kurang mampu. Kepedulian kita adalah kebahagiaan mereka di hari tua.',
                'image' => 'program-4.jpg', // Gambar lokal
                'target' => 60000000,
                'current_donation' => 15000000,
            ]
        ];
    }

    public function getPrograms()
    {
        return $this->programs;
    }

    public function index()
    {
        $data = [
            'title' => 'Semua Program',
            'programs' => $this->programs
        ];
        return view('pages/programs', $data);
    }

    public function detail($slug)
    {
        $program = null;
        foreach ($this->programs as $p) {
            if ($p['slug'] === $slug) {
                $program = $p;
                break;
            }
        }

        if (!$program) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $program['title'],
            'program' => $program
        ];
        return view('pages/program_detail', $data);
    }
}
