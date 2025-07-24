<header>
    <nav class="navbar">
        <div class="logo">
            <a href="<?= base_url() ?>"><i class="fas fa-hand-holding-heart"></i> Organisasi Peduli</a>
        </div>
        <ul class="nav-links">
            <li><a id="themeToggle" title="Ganti Mode"><i class="fas fa-moon"></i></a></li>
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><a href="<?= base_url('programs') ?>">Program</a></li>
            <li><a href="<?= base_url('contact') ?>">Kontak</a></li>
            <!-- Tombol donasi utama di navigasi -->
            <li><a href="<?= base_url('programs') ?>" class="btn btn-small">Donasi</a></li>
        </button>
        </ul>
        <button class="hamburger" aria-label="Toggle navigation menu">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</header>