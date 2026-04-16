<!-- HERO -->
<section class="hero hero-diabetes">
    <div class="hero-bg">
        <div class="cloud cloud-1"></div>
        <div class="cloud cloud-2"></div>
        <div class="floating-circle c1"></div>
        <div class="floating-circle c2"></div>
    </div>
    <div class="hero-content">
        <div class="hero-badge">🩺 Pemeriksaan Risiko</div>
        <h1 class="hero-title">
            Cek <span class="gradient-text">Risiko</span><br>
            Diabetes Anda
        </h1>
        <p class="hero-subtitle">
            Ketahui tingkat risiko diabetes Anda berdasarkan faktor gaya hidup
            dan riwayat kesehatan Anda
        </p>
    </div>
</section>

<!-- DEFINISI DIABETES -->
<section class="info-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">📖 Tentang Diabetes</span>
            <h2 class="section-title">Apa itu Diabetes?</h2>
        </div>
        <div class="diabetes-info-grid">
            <div class="diabetes-main-card">
                <div class="info-card-icon">🩸</div>
                <h3>Definisi Diabetes Melitus</h3>
                <p>Diabetes Melitus adalah penyakit kronis yang terjadi ketika pankreas tidak menghasilkan
                    cukup insulin, atau ketika tubuh tidak dapat secara efektif menggunakan insulin yang
                    dihasilkannya. Insulin adalah hormon yang mengatur kadar gula darah.</p>
            </div>
            <div class="diabetes-types">
                <div class="type-card type1">
                    <h4>🔵 Diabetes Tipe 1</h4>
                    <p>Kondisi autoimun di mana sistem kekebalan tubuh menyerang sel penghasil insulin.
                        Biasanya muncul sejak kecil atau remaja.</p>
                </div>
                <div class="type-card type2">
                    <h4>🟠 Diabetes Tipe 2</h4>
                    <p>Tubuh tidak menggunakan insulin dengan efektif. Tipe paling umum, sangat dipengaruhi
                        oleh gaya hidup dan dapat dicegah.</p>
                </div>
                <div class="type-card gestasional">
                    <h4>🟡 Diabetes Gestasional</h4>
                    <p>Terjadi saat kehamilan akibat perubahan hormonal. Biasanya hilang setelah melahirkan,
                        namun meningkatkan risiko diabetes tipe 2.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DIAGNOSIS -->
<section class="diagnosis-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">🔬 Kriteria Medis</span>
            <h2 class="section-title">Diagnosis Diabetes</h2>
        </div>
        <div class="diagnosis-grid">
            <div class="diagnosis-card">
                <div class="diag-value">≥ 126</div>
                <div class="diag-unit">mg/dL</div>
                <div class="diag-label">Gula Darah Puasa</div>
                <div class="diag-desc">Diukur setelah puasa minimal 8 jam</div>
            </div>
            <div class="diagnosis-card">
                <div class="diag-value">≥ 200</div>
                <div class="diag-unit">mg/dL</div>
                <div class="diag-label">Gula Darah Sewaktu</div>
                <div class="diag-desc">Disertai gejala klasik diabetes</div>
            </div>
            <div class="diagnosis-card">
                <div class="diag-value">≥ 6.5%</div>
                <div class="diag-unit">HbA1c</div>
                <div class="diag-label">Hemoglobin A1c</div>
                <div class="diag-desc">Rata-rata gula darah 3 bulan terakhir</div>
            </div>
            <div class="diagnosis-card">
                <div class="diag-value">≥ 200</div>
                <div class="diag-unit">mg/dL</div>
                <div class="diag-label">TTGO 2 Jam</div>
                <div class="diag-desc">Tes Toleransi Glukosa Oral</div>
            </div>
        </div>
        <p class="diagnosis-note">* Diagnosis resmi hanya dapat dilakukan oleh dokter dengan pemeriksaan laboratorium</p>
    </div>
</section>

<!-- FORM RISIKO -->
<section class="form-section" id="hitung-diabetes">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">📝 Asesmen Risiko</span>
            <h2 class="section-title">Cek Risiko Diabetes Saya</h2>
            <p class="section-subtitle">Jawab pertanyaan berikut dengan jujur untuk hasil terbaik</p>
        </div>
        <div class="form-wrapper">
            <form action="<?= base_url('/diabetes/hitung') ?>" method="POST" class="bmi-form">
                <?= csrf_field() ?>

                <div class="form-row">
                    <div class="form-group">
                        <label>🎂 Usia Anda</label>
                        <input type="number" name="usia" min="10" max="120" placeholder="Contoh: 40" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label>⚧ Jenis Kelamin</label>
                        <div class="gender-selector">
                            <label class="gender-option">
                                <input type="radio" name="gender" value="pria" required>
                                <span class="gender-box">👨 Pria</span>
                            </label>
                            <label class="gender-option">
                                <input type="radio" name="gender" value="wanita">
                                <span class="gender-box">👩 Wanita</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>⚖️ Nilai BMI Anda (jika sudah menghitung)</label>
                    <input type="number" name="bmi" step="0.1" min="10" max="60" placeholder="Contoh: 24.5 (isi 0 jika belum tahu)" class="form-input" value="0">
                </div>

                <div class="question-group">
                    <h4 class="question-title">🧬 Apakah ada anggota keluarga (orang tua/saudara) yang menderita diabetes?</h4>
                    <div class="radio-group">
                        <label class="radio-option"><input type="radio" name="riwayat" value="ya" required><span>Ya, ada</span></label>
                        <label class="radio-option"><input type="radio" name="riwayat" value="tidak"><span>Tidak ada</span></label>
                    </div>
                </div>

                <div class="question-group">
                    <h4 class="question-title">💉 Apakah Anda pernah didiagnosis tekanan darah tinggi (hipertensi)?</h4>
                    <div class="radio-group">
                        <label class="radio-option"><input type="radio" name="tekanan_darah" value="ya" required><span>Ya</span></label>
                        <label class="radio-option"><input type="radio" name="tekanan_darah" value="tidak"><span>Tidak</span></label>
                    </div>
                </div>

                <div class="question-group">
                    <h4 class="question-title">🏃 Bagaimana tingkat aktivitas fisik Anda sehari-hari?</h4>
                    <div class="radio-group">
                        <label class="radio-option"><input type="radio" name="aktivitas" value="aktif" required><span>Aktif (olahraga rutin ≥3x/minggu)</span></label>
                        <label class="radio-option"><input type="radio" name="aktivitas" value="kurang"><span>Kurang aktif (jarang olahraga)</span></label>
                        <label class="radio-option"><input type="radio" name="aktivitas" value="tidak"><span>Tidak aktif (hampir tidak pernah olahraga)</span></label>
                    </div>
                </div>

                <div class="question-group">
                    <h4 class="question-title">🚬 Apakah Anda merokok atau pernah merokok?</h4>
                    <div class="radio-group">
                        <label class="radio-option"><input type="radio" name="merokok" value="ya" required><span>Ya</span></label>
                        <label class="radio-option"><input type="radio" name="merokok" value="tidak"><span>Tidak</span></label>
                    </div>
                </div>

                <div class="question-group">
                    <h4 class="question-title">🍬 Apakah Anda sering mengonsumsi makanan/minuman tinggi gula?</h4>
                    <div class="radio-group">
                        <label class="radio-option"><input type="radio" name="gula" value="ya" required><span>Ya, sering</span></label>
                        <label class="radio-option"><input type="radio" name="gula" value="tidak"><span>Tidak / jarang</span></label>
                    </div>
                </div>

                <button type="submit" class="btn-hitung btn-diabetes">
                    <span class="btn-icon">🩺</span>
                    <span class="btn-text">Cek Risiko Diabetes Saya</span>
                    <span class="btn-arrow">→</span>
                </button>
            </form>
        </div>
    </div>
</section>

<!-- CATATAN -->
<section class="catatan-section">
    <div class="container">
        <div class="catatan-box catatan-diabetes">
            <div class="catatan-icon">⚠️</div>
            <div class="catatan-content">
                <h3>Catatan Penting</h3>
                <ul>
                    <li>Kalkulator ini <strong>bukan alat diagnostik medis</strong> resmi</li>
                    <li>Hasil hanya berdasarkan <strong>faktor risiko umum</strong> yang diakui secara ilmiah</li>
                    <li>Untuk diagnosis pasti, <strong>wajib melakukan pemeriksaan laboratorium</strong></li>
                    <li>Konsultasikan hasil dengan <strong>dokter atau tenaga kesehatan</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>