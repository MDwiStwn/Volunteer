<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Profil Perusahaan Sukarelawan - Organisasi Anda
<?= $this->endSection() ?>

<?= $this->section('content') ?>
      <section id="home" class="hero-section" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://www.wwf.id/sites/default/files/slider/DSCF8750%20%281%29.jpg') no-repeat center center/cover;">
        <div class="hero-content">
          <h1>Menciptakan Perubahan Positif, Bersama</h1>
          <p>
            Bergabunglah dengan kami dalam membangun komunitas yang lebih baik
            dan masa depan yang cerah.
          </p>
          <a href="<?= base_url('#get-involved') ?>" class="btn btn-secondary"
            >Bergabung Sekarang</a
          >
        </div>
      </section>

      <section id="about" class="section">
        <div class="container">
          <h2>Tentang Kami</h2>
          <div class="about-content">
            <div class="about-text">
              <h3>Misi Kami</h3>
              <p>
                Misi kami adalah memberdayakan individu dan komunitas melalui
                berbagai inisiatif sukarela yang berfokus pada pendidikan,
                lingkungan, dan kesejahteraan sosial. Kami percaya bahwa setiap
                tindakan kecil dapat menciptakan gelombang perubahan besar.
              </p>
              <h3>Kisah Kami</h3>
              <p>
                Didirikan pada tahun 2010 oleh sekelompok individu yang
                bersemangat, Organisasi Peduli dimulai dengan visi sederhana:
                untuk menyatukan orang-orang yang ingin memberikan dampak nyata.
                Sejak saat itu, kami telah tumbuh menjadi jaringan sukarelawan
                yang luas, bekerja tanpa lelah untuk mewujudkan tujuan kami.
              </p>
            </div>
            <div class="about-image">
              <img
                src="https://www.wwf.id/sites/default/files/slider/DSCF8750%20%281%29.jpg"
                alt="[Gambar Tim Sukarelawan]"
              />
            </div>
          </div>
        </div>
      </section>

      <section id="impact" class="section">
        <div class="container">
          <h2>Dampak Kami</h2>
          <div class="impact-stats">
            <div class="stat-item">
              <h3><i class="fas fa-users"></i> 10.000+</h3>
              <p>Jiwa Tersentuh</p>
            </div>
            <div class="stat-item">
              <h3><i class="fas fa-clock"></i> 50.000+</h3>
              <p>Jam Sukarela</p>
            </div>
            <div class="stat-item">
              <h3><i class="fas fa-leaf"></i> 100+</h3>
              <p>Proyek Lingkungan</p>
            </div>
          </div>

          <div class="carousel-container">
            <h3>Kisah Sukses</h3>
            <div class="carousel-slide">
              <div class="carousel-item">
                <img
                  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRO_zU_CkIPahftPFxoH-_Ssrk0tTLz0BRkLYea4mE1MtJ3uPa-fwbK7Ppr1_XXtJagCOI&usqp=CAU"
                  alt="[Gambar Testimoni 1]"
                />
                <p>
                  "Bergabung dengan Organisasi Peduli adalah salah satu
                  keputusan terbaik dalam hidup saya. Saya merasa sangat berarti
                  bisa membantu orang lain."
                </p>
                <h4>- Siti Aisyah, Sukarelawan</h4>
              </div>
              <div class="carousel-item">
                <img
                  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEH14u7rKYD9aCAr-qRwTjpnXljCPuy4xbQSkW4HWJtCFReJNpt0-3ZW3MQyiyaIWoYyI&usqp=CAU"
                  alt="[Gambar Testimoni 2]"
                />
                <p>
                  "Dukungan dari organisasi ini telah mengubah hidup banyak anak
                  di desa kami. Mereka kini memiliki harapan untuk masa depan
                  yang lebih baik."
                </p>
                <h4>- Budi Santoso, Penerima Manfaat</h4>
              </div>
              <div class="carousel-item">
                <img
                  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtdlinPDu4XAm8AD1tGU_SKVHazTZ2N26gpg&s"
                  alt="[Gambar Testimoni 3]"
                />
                <p>
                  "Saya bangga menjadi bagian dari tim yang berdedikasi ini.
                  Kami bekerja keras untuk menciptakan dampak nyata dan
                  berkelanjutan."
                </p>
                <h4>- Maria Putri, Koordinator Program</h4>
              </div>
            </div>
            <div class="carousel-nav">
              <button id="prevBtn"><i class="fas fa-chevron-left"></i></button>
              <button id="nextBtn"><i class="fas fa-chevron-right"></i></button>
            </div>
          </div>
        </div>
      </section>

      <section id="programs" class="section">
        <div class="container">
          <h2>Program Kami</h2>
          <div class="program-grid">
            <div class="program-card">
              <h3><i class="fas fa-book-open"></i> Dukungan Pendidikan</h3>
              <p>
                Menyediakan bimbingan belajar, buku, dan sumber daya pendidikan
                untuk anak-anak kurang mampu, memastikan mereka memiliki akses
                ke pendidikan berkualitas.
              </p>
              <a href="#" class="btn btn-small">Pelajari Lebih Lanjut</a>
            </div>
            <div class="program-card">
              <h3><i class="fas fa-tree"></i> Lingkungan Bersih</h3>
              <p>
                Mengorganisir kegiatan bersih-bersih lingkungan, penanaman
                pohon, dan kampanye kesadaran untuk menjaga kelestarian alam.
              </p>
              <a href="#" class="btn btn-small">Pelajari Lebih Lanjut</a>
            </div>
            <div class="program-card">
              <h3><i class="fas fa-handshake"></i> Kesejahteraan Sosial</h3>
              <p>
                Memberikan bantuan kepada keluarga yang membutuhkan, program
                makanan, dan dukungan kesehatan untuk meningkatkan kualitas
                hidup masyarakat.
              </p>
              <a href="#" class="btn btn-small">Pelajari Lebih Lanjut</a>
            </div>
            <div class="program-card">
              <h3><i class="fas fa-heart"></i> Kesehatan Komunitas</h3>
              <p>
                Menyelenggarakan pemeriksaan kesehatan gratis, penyuluhan gizi,
                dan program vaksinasi untuk meningkatkan kesehatan masyarakat.
              </p>
              <a href="#" class="btn btn-small">Pelajari Lebih Lanjut</a>
            </div>
          </div>
        </div>
      </section>

      <section id="get-involved" class="section">
        <div class="container">
          <h2>Bergabunglah dengan Kami</h2>
          <div class="get-involved-options">
            <div class="option-card">
              <h3><i class="fas fa-user-friends"></i> Menjadi Sukarelawan</h3>
              <p>
                Berikan waktu dan keterampilan Anda untuk mendukung
                proyek-proyek kami. Ada berbagai peran yang bisa Anda pilih
                sesuai minat.
              </p>
              <a href="#" class="btn">Daftar Sekarang</a>
            </div>
            <div class="option-card">
              <h3><i class="fas fa-donate"></i> Berdonasi</h3>
              <p>
                Dukungan finansial Anda sangat berarti bagi kelangsungan
                program-program kami. Setiap donasi, besar atau kecil, membuat
                perbedaan.
              </p>
              <a href="#" class="btn">Donasi Sekarang</a>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" class="section">
        <div class="container">
          <h2>Hubungi Kami</h2>
          <!-- Aksi formulir akan mengarah ke rute/metode kontroler CodeIgniter -->
          <form class="contact-form" id="contactForm" action="<?= site_url('home/submitContact') ?>" method="post">
            <input type="text" id="name" name="name" placeholder="Nama Anda" required />
            <input type="email" id="email" name="email" placeholder="Email Anda" required />
            <textarea
              id="message"
              name="message"
              placeholder="Pesan Anda"
              rows="6"
              required
            ></textarea>
            <button type="submit" class="btn">Kirim Pesan</button>
          </form>
          <div class="contact-info">
            <p><i class="fas fa-envelope"></i> info@organisasipeduli.com</p>
            <p><i class="fas fa-phone"></i> +62 123 4567 890</p>
            <p>
              <i class="fas fa-map-marker-alt"></i> Jl. Sukarelawan No. 123,
              Jakarta, Indonesia
            </p>
            <div class="social-links">
              <a
                href="https://facebook.com"
                target="_blank"
                aria-label="Facebook"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a href="https://twitter.com" target="_blank" aria-label="Twitter"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                href="https://instagram.com"
                target="_blank"
                aria-label="Instagram"
                ><i class="fab fa-instagram"></i
              ></a>
              <a
                href="https://linkedin.com"
                target="_blank"
                aria-label="LinkedIn"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
        </div>
      </section>
<?= $this->endSection() ?>
