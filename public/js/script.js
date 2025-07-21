document.addEventListener("DOMContentLoaded", () => {
    // --- Inisialisasi Library ---
    try {
        AOS.init({
            duration: 800,
            once: true,
        });
    } catch (e) {
        console.error("AOS library not found or failed to initialize.");
    }

    try {
        const successSlider = new Swiper('.success-story-slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    } catch (e) {
        console.error("Swiper library not found or failed to initialize.");
    }

    // --- Elemen DOM ---
    const hamburger = document.querySelector(".hamburger");
    const navLinks = document.querySelector(".nav-links");
    const backToTopBtn = document.getElementById("backToTopBtn");
    
    // --- Navigasi & UI Umum ---
    if (hamburger && navLinks) {
        hamburger.addEventListener("click", () => {
            navLinks.classList.toggle("active");
        });
    }

    window.addEventListener("scroll", () => {
        if (backToTopBtn) {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTopBtn.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
            }
        }
    });

    if (backToTopBtn) {
        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
    
    // --- Penanganan Form AJAX Umum ---
    const handleFormSubmit = async (form, messageDivId) => {
        const formData = new FormData(form);
        const messageDiv = document.getElementById(messageDivId);
        
        // Hapus pesan error sebelumnya
        form.querySelectorAll('.error-text').forEach(el => el.textContent = '');
        messageDiv.style.display = 'none';

        try {
            const response = await fetch(form.action, {
                method: "POST",
                body: formData,
                headers: { "X-Requested-With": "XMLHttpRequest" },
            });

            const result = await response.json();

            if (response.ok) {
                messageDiv.className = 'form-message success';
                messageDiv.innerHTML = result.message;
                messageDiv.style.display = 'block';
                form.reset();
                return { success: true, data: result };
            } else {
                if (result.errors) {
                    for (const key in result.errors) {
                        const errorEl = form.querySelector(`#error-${key}`);
                        if (errorEl) {
                            errorEl.textContent = result.errors[key];
                        }
                    }
                }
                messageDiv.className = 'form-message error';
                messageDiv.innerHTML = result.message || 'Terjadi kesalahan validasi.';
                messageDiv.style.display = 'block';
                return { success: false, data: result };
            }
        } catch (error) {
            console.error("Form submission error:", error);
            messageDiv.className = 'form-message error';
            messageDiv.innerHTML = 'Terjadi kesalahan jaringan. Silakan coba lagi nanti.';
            messageDiv.style.display = 'block';
            return { success: false, error: error };
        }
    };

    // Terapkan pada Form Kontak
    const contactForm = document.getElementById("contactForm");
    if (contactForm) {
        contactForm.addEventListener("submit", (e) => {
            e.preventDefault();
            handleFormSubmit(contactForm, 'contact-message');
        });
    }

    // --- Penanganan Form Donasi di Halaman Detail ---
    const donationForm = document.getElementById('donationForm');
    if (donationForm) {
        const amountButtons = donationForm.querySelectorAll('.btn-amount');
        const amountInput = donationForm.querySelector('#donationAmount');

        amountButtons.forEach(button => {
            button.addEventListener('click', () => {
                amountButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                amountInput.value = button.dataset.amount;
            });
        });
        
        amountInput.addEventListener('input', () => {
            amountButtons.forEach(btn => {
                if(btn.dataset.amount === amountInput.value) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        });

        donationForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const response = await handleFormSubmit(donationForm, 'donation-message');
            if (response.success) {
                // Update progress bar
                updateProgressBar(response.data.new_total, response.data.target);
                // Tampilkan popup
                showDonationPopup(donationForm.elements.amount.value, response.data.program_title);
                // Reset tombol aktif
                amountButtons.forEach(btn => btn.classList.remove('active'));
            }
        });
    }
    
    function updateProgressBar(newTotal, target) {
        const progressFill = document.getElementById('detail-progress-fill');
        const statsDiv = document.getElementById('detail-donation-stats');
        if (!progressFill || !statsDiv) return;

        const percentage = (newTotal / target) * 100;
        progressFill.style.width = `${Math.min(percentage, 100)}%`;
        
        statsDiv.innerHTML = `
            <span><b>Rp ${parseInt(newTotal).toLocaleString('id-ID')}</b> terkumpul</span>
            <span class="target">Target: Rp ${parseInt(target).toLocaleString('id-ID')}</span>
        `;
    }

    // --- Logika Modal/Popup Donasi ---
    const donationModalOverlay = document.getElementById('donationModalOverlay');
    const closeDonationModalBtn = document.getElementById('closeDonationModal');

    function showDonationPopup(amount, programTitle) {
        if (!donationModalOverlay) return;
        
        const amountDisplay = donationModalOverlay.querySelector('.donation-amount-display');
        const programDisplay = donationModalOverlay.querySelector('.donation-program-display');

        amountDisplay.textContent = `Jumlah Donasi: Rp ${parseInt(amount).toLocaleString('id-ID')}`;
        programDisplay.textContent = `Program: ${programTitle}`;

        donationModalOverlay.classList.add('active');
    }

    if (closeDonationModalBtn) {
        closeDonationModalBtn.addEventListener('click', () => donationModalOverlay.classList.remove('active'));
    }
    if (donationModalOverlay) {
        donationModalOverlay.addEventListener('click', (e) => {
            if (e.target === donationModalOverlay) {
                donationModalOverlay.classList.remove('active');
            }
        });
    }
});
