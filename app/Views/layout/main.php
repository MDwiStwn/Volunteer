<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= esc($title ?? 'Organisasi Peduli') ?></title>
    
    <!-- Favicon -->
    <link rel="icon" href="https://placehold.co/32x32/28a745/ffffff?text=OP" type="image/png">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" xintegrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <!-- Libraries for Interactivity -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
</head>
<body>
    <!-- Memasukkan komponen header -->
    <?= $this->include('components/header') ?>

    <main>
        <!-- Konten utama dari setiap halaman akan dirender di sini -->
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Memasukkan komponen footer -->
    <?= $this->include('components/footer') ?>
    
    <!-- Memasukkan komponen popup donasi (tersembunyi secara default) -->
    <?= $this->include('components/popup-donation') ?>

    <!-- Tombol kembali ke atas -->
    <button id="backToTopBtn" title="Kembali ke atas">
      <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Libraries JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- Main Script -->
    <script src="<?= base_url('js/script.js') ?>"></script>
</body>
</html>