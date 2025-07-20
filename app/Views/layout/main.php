<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bagian ini akan diisi oleh tampilan spesifik -->
    <title><?= $this->renderSection('title') ?></title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- Menggunakan base_url() untuk tautan aset statis -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <style>
      /* Gaya untuk kotak pesan kustom */
      .message-box {
        display: none; /* Sembunyikan secara default */
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        z-index: 1001;
        text-align: center;
        max-width: 400px;
        width: 90%;
        border-top: 5px solid var(--primary-color);
      }
      .message-box.error {
        border-top-color: #dc3545; /* Merah untuk error */
      }
      .message-box.success {
        border-top-color: var(--primary-color); /* Hijau untuk sukses */
      }
      .message-box p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-color);
      }
      .message-box button {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s ease;
      }
      .message-box.error button {
        background-color: #dc3545;
      }
      .message-box button:hover {
        opacity: 0.9;
      }
      .overlay {
        display: none; /* Sembunyikan secara default */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
      }
    </style>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <!-- Menggunakan base_url() untuk tautan beranda -->
          <a href="<?= base_url() ?>"
            ><i class="fas fa-hand-holding-heart"></i> Organisasi Peduli</a
          >
        </div>
        <ul class="nav-links">
          <!-- Menggunakan base_url() untuk tautan navigasi internal -->
          <li><a href="<?= base_url('#home') ?>">Beranda</a></li>
          <li><a href="<?= base_url('#about') ?>">Tentang Kami</a></li>
          <li><a href="<?= base_url('#impact') ?>">Dampak Kami</a></li>
          <li><a href="<?= base_url('#programs') ?>">Program</a></li>
          <li><a href="<?= base_url('#get-involved') ?>">Bergabunglah</a></li>
          <li><a href="<?= base_url('#contact') ?>">Kontak</a></li>
        </ul>
        <button class="hamburger" aria-label="Toggle navigation menu">
          <i class="fas fa-bars"></i>
        </button>
      </nav>
    </header>

    <main>
        <!-- Bagian ini akan diisi oleh konten utama dari tampilan spesifik -->
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
      <div class="container">
        <p>&copy; 2025 Organisasi Peduli. Semua Hak Dilindungi.</p>
      </div>
    </footer>

    <button id="backToTopBtn" title="Kembali ke atas">
      <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Kotak pesan kustom -->
    <div id="messageBox" class="message-box">
      <p id="messageText"></p>
      <button id="closeMessageBox">Tutup</button>
    </div>
    <div id="overlay" class="overlay"></div>

    <!-- Menggunakan base_url() untuk tautan skrip JavaScript -->
    <script src="<?= base_url('js/script.js') ?>"></script>
  </body>
</html>
