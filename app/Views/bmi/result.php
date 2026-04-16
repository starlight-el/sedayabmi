<section class="result-hero">
    <div class="result-hero-bg"></div>
    <div class="container">
        <div class="result-card">
            <div class="result-header">
                <h2>Hasil BMI <?= esc($nama) ?></h2>
                <p>Perhitungan berdasarkan standar WHO Asia Pasifik</p>
            </div>

            <div class="result-main">
                <div class="bmi-circle-wrapper">
                    <div class="bmi-circle <?= esc($warna) ?>">
                        <span class="bmi-number"><?= esc($bmi) ?></span>
                        <span class="bmi-label">BMI</span>
                    </div>
                </div>
                <div class="result-info">
                    <div class="result-icon"><?= $icon ?></div>
                    <h3 class="result-kategori <?= esc($warna) ?>"><?= esc($kategori) ?></h3>
                    <p class="result-deskripsi"><?= esc($deskripsi) ?></p>

                    <div class="result-details">
                        <?php if ($nama): ?><div class="detail-item"><span>👤 Nama</span><strong><?= esc($nama) ?></strong></div><?php endif; ?>
                        <?php if ($usia): ?><div class="detail-item"><span>🎂 Usia</span><strong><?= esc($usia) ?> tahun</strong></div><?php endif; ?>
                        <div class="detail-item"><span>⚖️ Berat</span><strong><?= esc($berat) ?> kg</strong></div>
                        <div class="detail-item"><span>📏 Tinggi</span><strong><?= esc($tinggi) ?> cm</strong></div>
                    </div>
                </div>
            </div>

            <!-- Skala BMI Visual -->
            <div class="bmi-scale">
                <div class="scale-bar">
                    <div class="scale-fill" style="width: <?= min(100, max(5, ($bmi / 40) * 100)) ?>%"
                        data-bmi="<?= esc($bmi) ?>"></div>
                    <div class="scale-pointer" style="left: <?= min(100, max(2, ($bmi / 40) * 100)) ?>%"></div>
                </div>
                <div class="scale-labels">
                    <span>Kurang<br><small>&lt;18.5</small></span>
                    <span>Normal<br><small>18.5-22.9</small></span>
                    <span>Lebih<br><small>23-24.9</small></span>
                    <span>Obesitas I<br><small>25-29.9</small></span>
                    <span>Obesitas II<br><small>≥30</small></span>
                </div>
            </div>

            <div class="saran-box">
                <h4>💡 Rekomendasi untuk Anda</h4>
                <p><?= esc($saran) ?></p>
            </div>

            <div class="result-actions">
                <a href="<?= base_url('/') ?>" class="btn-secondary">← Hitung Lagi</a>
                <a href="<?= base_url('/diabetes') ?>" class="btn-primary">Cek Risiko Diabetes →</a>
            </div>
        </div>
    </div>
</section>