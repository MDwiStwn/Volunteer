<?php
// Ambil data donasi simulasi dari session
$session = session();
$simulated_donations = $session->get('simulated_donations') ?? [];
$additional_donation = $simulated_donations[$program['slug']] ?? 0;
$current_donation = $program['current_donation'] + $additional_donation;
$percentage = ($current_donation / $program['target']) * 100;

// Path gambar lokal (public/images/)
$imagePath = base_url('images/' . $program['image']);
?>
<div class="program-card" data-aos="fade-up" data-aos-delay="100">
    <div class="card-image">
        <a href="<?= base_url('program/' . $program['slug']) ?>">
            <img src="<?= $imagePath ?>" alt="<?= esc($program['title']) ?>" loading="lazy">
        </a>
    </div>
    <div class="card-content">
        <h3>
            <a href="<?= base_url('program/' . $program['slug']) ?>"><?= esc($program['title']) ?></a>
        </h3>
        <p><?= esc($program['short_description']) ?></p>
        <div class="progress-bar">
            <div class="progress" style="width: <?= min($percentage, 100) ?>%;"></div>
        </div>
        <div class="donation-stats">
            <span><b>Rp <?= number_format($current_donation, 0, ',', '.') ?></b> terkumpul</span>
            <span class="target">Target: Rp <?= number_format($program['target'], 0, ',', '.') ?></span>
        </div>
        <a href="<?= base_url('program/' . $program['slug']) ?>" class="btn btn-small">Donasi Sekarang</a>
    </div>
</div>
