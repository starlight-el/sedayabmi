<section class="result-hero">
    <div class="container">
        <div class="result-card">
            <div class="result-header">
                <h2>Hasil Asesmen Risiko Diabetes</h2>
                <p>Berdasarkan faktor risiko yang Anda berikan</p>
            </div>

            <div class="result-main diabetes-result">
                <div class="risk-meter">
                    <div class="risk-circle <?= esc($warna) ?>">
                        <span class="risk-icon"><?= $icon ?></span>
                        <span class="risk-label"><?= esc($risiko) ?></span>
                    </div>
                </div>
                <div class="result-info">
                    <h3 class="result-kategori <?= esc($warna) ?>"><?= esc($risiko) ?></h3>
                    <p class="result-deskripsi"><?= esc($deskripsi) ?></p>

                    <div class="result-details">
                        <div class="detail-item"><span>🎂 Usia</span><strong><?= esc($usia) ?> tahun</strong></div>
                        <?php if ($bmi_val > 0): ?>
                            <div class="detail-item"><span>⚖️ BMI</span><strong><?= esc($bmi_val) ?></strong></div>
                        <?php endif; ?>
                        <div class="detail-item"><span>📊 Skor Risiko</span><strong><?= esc($skor) ?> / 17</strong></div>
                    </div>
                </div>
            </div>

            <!-- Progress Bar Risiko -->
            <div class="risk-progress-wrapper">
                <label>Tingkat Risiko</label>
                <div class="risk-progress-bar">
                    <div class="risk-progress-fill <?= esc($warna) ?>"
                        style="width: 0%"
                        data-target="<?= esc($persen) ?>"></div>
                </div>
                <div class="risk-progress-labels">
                    <span>Rendah</span><span>Sedang</span><span>Tinggi</span><span>Sangat Tinggi</span>
                </div>
            </div>

            <!-- Saran List -->
            <div class="saran-list-box">
                <h4>💊 Rekomendasi Tindakan</h4>
                <ul class="saran-list">
                    <?php foreach ($saran_list as $s): ?>
                        <li><span class="saran-bullet">✓</span> <?= esc($s) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="result-actions">
                <a href="<?= base_url('/diabetes') ?>" class="btn-secondary">← Hitung Ulang</a>
                <a href="<?= base_url('/') ?>" class="btn-primary">Cek BMI →</a>
            </div>
        </div>
    </div>
</section>