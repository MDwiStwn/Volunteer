<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<?php
// Ambil data donasi simulasi dari session untuk tampilan awal
$session = session();
$simulated_donations = $session->get('simulated_donations') ?? [];
$additional_donation = $simulated_donations[$program['slug']] ?? 0;
$current_donation = $program['current_donation'] + $additional_donation;
$percentage = ($current_donation / $program['target']) * 100;

// Path gambar lokal
$imagePath = base_url('images/' . $program['image']);
?>
<section class="section page-header">
    <div class="container">
        <h1 data-aos="fade-down"><?= esc($program['title']) ?></h1>
    </div>
</section>

<section id="program-detail" class="section">
    <div class="container">
        <div class="detail-content">
            <div class="detail-image" data-aos="fade-right">
                <img src="<?= $imagePath ?>" alt="<?= esc($program['title']) ?>">
            </div>
            <div class="detail-info" data-aos="fade-left">
                <h2>Deskripsi Program</h2>
                <p><?= nl2br(esc($program['full_description'])) ?></p>

                <div class="donation-progress-container">
                    <h3>Progress Donasi</h3>
                    <div class="progress-bar" id="detail-progress-bar">
                        <div class="progress" style="width: <?= min($percentage, 100) ?>%;" id="detail-progress-fill"></div>
                    </div>
                    <div class="donation-stats" id="detail-donation-stats">
                        <span><b>Rp <?= number_format($current_donation, 0, ',', '.') ?></b> terkumpul</span>
                        <span class="target">Target: Rp <?= number_format($program['target'], 0, ',', '.') ?></span>
                    </div>
                </div>

                <div class="donation-form-simple">
                    <h3>Bantu Sekarang</h3>
                    <form id="donationForm" action="<?= site_url('donation/process') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="program_slug" value="<?= esc($program['slug']) ?>">
                        <div class="amount-options">
                            <button type="button" class="btn-amount" data-amount="25000">25rb</button>
                            <button type="button" class="btn-amount" data-amount="50000">50rb</button>
                            <button type="button" class="btn-amount" data-amount="100000">100rb</button>
                        </div>
                        <input type="number" name="amount" id="donationAmount" placeholder="Atau masukkan jumlah lain (min. 10rb)" required min="10000">
                        <button type="submit" class="btn btn-secondary">Lanjutkan Pembayaran</button>
                    </form>
                    <div id="donation-message" class="form-message"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
