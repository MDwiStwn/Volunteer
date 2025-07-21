<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<section class="section page-header">
    <div class="container">
        <h1 data-aos="fade-down">Hubungi Kami</h1>
        <p data-aos="fade-up">Kami senang mendengar dari Anda. Kirimkan pertanyaan atau masukan Anda melalui form di bawah ini.</p>
    </div>
</section>

<section id="contact" class="section">
    <div class="container">
        <div class="contact-wrapper" data-aos="fade-up">
            <form class="contact-form" id="contactForm" action="<?= site_url('contact/submit') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required />
                    <small class="error-text" id="error-name"></small>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required />
                    <small class="error-text" id="error-email"></small>
                </div>
                <div class="form-group">
                    <label for="message">Pesan Anda</label>
                    <textarea id="message" name="message" placeholder="Tuliskan pesan Anda di sini" rows="6" required></textarea>
                    <small class="error-text" id="error-message"></small>
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
                <div id="contact-message" class="form-message"></div>
            </form>
            <div class="contact-info">
                <h3>Informasi Kontak</h3>
                <p><i class="fas fa-envelope"></i> info@organisasipeduli.com</p>
                <p><i class="fas fa-phone"></i> +62 123 4567 890</p>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Sukarelawan No. 123, Jakarta, Indonesia</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
