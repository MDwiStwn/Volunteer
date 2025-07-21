<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section about">
                <h3 class="logo-text"><i class="fas fa-hand-holding-heart"></i> <span>Organisasi</span>Peduli</h3>
                <p>
                    Menciptakan perubahan positif, satu aksi pada satu waktu. Bergabunglah dengan kami dalam membangun komunitas yang lebih baik dan masa depan yang lebih cerah.
                </p>
                <div class="contact">
                    <span><i class="fas fa-phone"></i> &nbsp; +62 123-4567-890</span>
                    <span><i class="fas fa-envelope"></i> &nbsp; info@organisasipeduli.com</span>
                </div>
                <div class="socials">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-section links">
                <h3>Tautan Cepat</h3>
                <br>
                <ul>
                    <li><a href="<?= base_url() ?>">Beranda</a></li>
                    <li><a href="<?= base_url('programs') ?>">Program Kami</a></li>
                    <li><a href="<?= base_url('contact') ?>">Hubungi Kami</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="footer-section contact-form">
                <h3>Langganan Newsletter</h3>
                <br>
                <p>Dapatkan info terbaru mengenai program dan dampak kami langsung di email Anda.</p>
                <form action="#" method="post">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Alamat email Anda..." required>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Langganan
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; <?= date('Y') ?> Organisasi Peduli. Dibuat dengan ❤️ di Indonesia.
        </div>
    </div>
</footer>
