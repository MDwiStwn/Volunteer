document.addEventListener("DOMContentLoaded", () => {
  // Dapatkan elemen-elemen DOM yang dibutuhkan
  const navLinks = document.querySelector(".nav-links");
  const hamburger = document.querySelector(".hamburger");
  const backToTopBtn = document.getElementById("backToTopBtn");
  const contactForm = document.getElementById("contactForm");
  const messageBox = document.getElementById("messageBox");
  const messageText = document.getElementById("messageText");
  const closeMessageBoxBtn = document.getElementById("closeMessageBox");
  const overlay = document.getElementById("overlay");

  // Fungsi untuk menampilkan kotak pesan kustom
  const showMessageBox = (message, type = "success") => {
    messageText.textContent = message;
    messageBox.className = "message-box " + type; // Tambahkan kelas 'success' atau 'error'
    messageBox.style.display = "block";
    overlay.style.display = "block";
  };

  // Fungsi untuk menyembunyikan kotak pesan kustom
  const hideMessageBox = () => {
    messageBox.style.display = "none";
    overlay.style.display = "none";
  };

  // Event listener untuk tombol 'Tutup' pada kotak pesan
  if (closeMessageBoxBtn) {
    closeMessageBoxBtn.addEventListener("click", hideMessageBox);
  }
  if (overlay) {
    overlay.addEventListener("click", hideMessageBox);
  }

  // 1. Navigasi Responsif (Hamburger Menu)
  if (hamburger) {
    hamburger.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });
  }

  // Tutup menu navigasi saat tautan diklik (khusus mobile)
  document.querySelectorAll(".nav-links a").forEach((link) => {
    link.addEventListener("click", () => {
      if (window.innerWidth <= 768) {
        navLinks.classList.remove("active");
      }
    });
  });

  // 2. Smooth Scrolling untuk tautan navigasi
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault(); // Mencegah perilaku default tautan

      const targetId = this.getAttribute("href");
      // Hanya gulir jika targetId dimulai dengan '#' dan bukan hanya '#' itu sendiri
      if (targetId && targetId !== "#") {
        const targetSection = document.querySelector(targetId);

        if (targetSection) {
          // Gulir ke bagian yang dituju dengan perilaku halus
          targetSection.scrollIntoView({
            behavior: "smooth",
          });
        }
      } else if (targetId === "#") {
        // Jika hanya '#', gulir ke atas halaman
        document.body.scrollTop = 0; // Untuk Safari
        document.documentElement.scrollTop = 0; // Untuk Chrome, Firefox, IE, dan Opera
      }
    });
  });

  // 3. Tombol Kembali ke Atas
  // Tampilkan atau sembunyikan tombol berdasarkan posisi gulir
  window.onscroll = function () {
    if (backToTopBtn) {
      if (
        document.body.scrollTop > 200 ||
        document.documentElement.scrollTop > 200
      ) {
        backToTopBtn.style.display = "block";
      } else {
        backToTopBtn.style.display = "none";
      }
    }
  };

  // Gulir ke atas saat tombol diklik
  if (backToTopBtn) {
    backToTopBtn.addEventListener("click", () => {
      document.body.scrollTop = 0; // Untuk Safari
      document.documentElement.scrollTop = 0; // Untuk Chrome, Firefox, IE, dan Opera
    });
  }

  // 4. Penanganan Form Kontak
  if (contactForm) {
    contactForm.addEventListener("submit", async (e) => {
      e.preventDefault(); // Mencegah pengiriman form default

      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const message = document.getElementById("message").value.trim();

      // Fungsi validasi email
      const validateEmail = (email) => {
        const re =
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
      };

      // Logika validasi sisi klien
      if (name === "" || email === "" || message === "") {
        showMessageBox("Mohon lengkapi semua kolom.", "error");
        return;
      } else if (!validateEmail(email)) {
        showMessageBox("Mohon masukkan alamat email yang valid.", "error");
        return;
      }

      // Kirim data formulir menggunakan Fetch API
      try {
        const formData = new FormData(contactForm);
        const response = await fetch(contactForm.action, {
          method: "POST",
          body: formData,
          headers: {
            "X-Requested-With": "XMLHttpRequest", // Penting untuk CI4 AJAX detection
          },
        });

        const result = await response.json(); // Asumsikan respons JSON dari CI4

        if (result.status === "success") {
          showMessageBox(result.message, "success");
          contactForm.reset();
        } else {
          // Tampilkan pesan error dari server
          let errorMessage = "Terjadi kesalahan. Silakan coba lagi.";
          if (result.errors) {
            errorMessage = Object.values(result.errors).join("<br>"); // Gabungkan semua pesan error
          } else if (result.message) {
            errorMessage = result.message;
          }
          showMessageBox(errorMessage, "error");
        }
      } catch (error) {
        console.error("Error submitting form:", error);
        showMessageBox(
          "Terjadi kesalahan jaringan atau server. Silakan coba lagi.",
          "error"
        );
      }
    });
  }

  // 5. Carousel Gambar Sederhana untuk Kisah Sukses
  const carouselSlide = document.querySelector(".carousel-slide");
  const carouselItems = document.querySelectorAll(".carousel-item");
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");

  let currentIndex = 0;
  const totalItems = carouselItems.length;

  // Fungsi untuk memperbarui tampilan carousel
  const updateCarousel = () => {
    if (carouselItems.length > 0) {
      const itemWidth = carouselItems[0].clientWidth; // Lebar setiap item
      carouselSlide.style.transform = `translateX(${
        -currentIndex * itemWidth
      }px)`;
    }
  };

  // Event listener untuk tombol 'Sebelumnya'
  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      currentIndex = currentIndex === 0 ? totalItems - 1 : currentIndex - 1;
      updateCarousel();
    });
  }

  // Event listener untuk tombol 'Berikutnya'
  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      currentIndex = currentIndex === totalItems - 1 ? 0 : currentIndex + 1;
      updateCarousel();
    });
  }

  // Perbarui carousel saat ukuran jendela berubah (responsif)
  window.addEventListener("resize", updateCarousel);

  // Inisialisasi carousel saat halaman dimuat
  updateCarousel();
});
