<div class="modal-overlay" id="donationModalOverlay">
    <div class="modal-container" id="donationModal">
        <button class="modal-close" id="closeDonationModal" aria-label="Tutup Popup">&times;</button>
        <div class="modal-header">
            <h3><i class="fas fa-check-circle"></i> Donasi Berhasil!</h3>
        </div>
        <div class="modal-body">
            <p>Terima kasih atas kebaikan Anda! Donasi Anda akan segera kami proses.</p>
            <div class="qris-section">
                <p>Silakan pindai QR Code di bawah ini untuk menyelesaikan pembayaran:</p>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=TerimaKasihAtasDonasiAnda" alt="[Gambar Kode QRIS untuk donasi]">
                <p class="donation-amount-display"></p>
                <p class="donation-program-display"></p>
            </div>
            <div class="manual-transfer">
                <p>Atau transfer manual ke rekening berikut:</p>
                <p><strong>Bank BCA: 123-456-7890</strong><br>a.n. Yayasan Organisasi Peduli</p>
            </div>
        </div>
        <div class="modal-footer">
            <p>Setelah melakukan transfer, donasi Anda akan otomatis terverifikasi oleh sistem kami.</p>
        </div>
    </div>
</div>