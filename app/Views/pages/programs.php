<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<section class="section page-header">
    <div class="container">
        <h1 data-aos="fade-down">Semua Program</h1>
        <p data-aos="fade-up">Setiap program dirancang untuk memberikan dampak maksimal. Pilih program yang paling menyentuh hati Anda untuk berdonasi.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="program-grid">
            <?php if (empty($programs)): ?>
                <p>Saat ini belum ada program yang tersedia.</p>
            <?php else: ?>
                <?php foreach ($programs as $program): ?>
                    <?= view('components/program-card', ['program' => $program]) ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>