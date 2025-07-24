<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <!-- Hero Section with Video Background -->
        <section class="hero-section hero-video relative w-full h-screen">
        <!-- Video Background -->
        <video
            class="absolute inset-0 w-full h-full object-cover"
            playsinline autoplay muted loop
            poster="<?= base_url('images/hero-poster.jpg') ?>" id="bgvideo">
            <!-- Format MP4 lokal -->
            <source src="<?= base_url('videos/hero.mp4') ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Content Overlay -->
        <div class="hero-content relative z-10 flex flex-col justify-center items-center text-center text-white h-full bg-black/40">
            <h1 class="text-5xl md:text-4xl sm:text-3xl font-bold leading-tight drop-shadow-lg">
            Menciptakan Perubahan Positif, Bersama
            </h1>
            <p class="mt-4 text-lg md:text-base sm:text-sm max-w-md">
            Setiap tindakan kecil dapat menciptakan gelombang kebaikan yang besar. Bergabunglah dengan kami.
            </p>
            <a href="<?= base_url('programs') ?>" class="btn btn-secondary mt-6">
            Mulai Berdonasi
            </a>
        </div>
        </section>



    <!-- About Section -->
    <section id="about" class="section py-16 bg-gray-50">
    <div class="container mx-auto about-content flex flex-col md:flex-row gap-8 items-center px-4">
        
        <!-- About Text -->
        <div class="about-text md:w-1/2 text-gray-800" data-aos="fade-right">
        <h2 class="text-4xl md:text-3xl sm:text-2xl font-bold mb-4">Tentang Kami</h2>
        <h3 class="text-2xl md:text-xl sm:text-lg font-semibold mb-2 text-yellow-600">Misi Kami untuk Indonesia</h3>
        <p class="text-base md:text-sm leading-relaxed mb-4">
            Misi kami adalah memberdayakan individu dan komunitas melalui berbagai inisiatif sukarela yang berfokus pada pendidikan, lingkungan, dan kesejahteraan sosial.
        </p>
        <h3 class="text-2xl md:text-xl sm:text-lg font-semibold mb-2 text-yellow-600">Kisah Kami</h3>
        <p class="text-base md:text-sm leading-relaxed">
            Didirikan pada tahun 2025, Organisasi Peduli dimulai dengan visi sederhana: untuk menyatukan orang-orang yang ingin memberikan dampak nyata. Kini, kami telah menjadi jembatan kebaikan bagi ribuan donatur di seluruh Indonesia.
        </p>
        </div>

        <!-- About Image -->
        <div class="about-image md:w-1/2" data-aos="fade-left">
        <img 
            src="<?= base_url('images/about.jpg') ?>" 
            alt="Tim sukarelawan sedang berdiskusi"
            class="rounded-lg shadow-lg w-full h-auto object-cover"
        >
        </div>
    </div>
    </section>


    <!-- Featured Programs Section -->
    <section id="programs" class="section">
        <div class="container">
            <h2 data-aos="fade-up">Program Unggulan Kami</h2>
            <div class="program-grid">
                <?php foreach ($programs as $program): ?>
                    <?= view('components/program-card', ['program' => $program]) ?>
                <?php endforeach; ?>

            </div>
            <div class="text-center" style="margin-top: 50px;" data-aos="fade-up">
                 <a href="<?= base_url('programs') ?>" class="btn">Lihat Semua Program</a>
            </div>
        </div>
    </section>

    <!-- Success Story Carousel -->
    <?= $this->include('components/carousel') ?>
<?= $this->endSection() ?>