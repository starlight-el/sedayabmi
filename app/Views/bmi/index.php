<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-bg">
        <div class="cloud cloud-1"></div>
        <div class="cloud cloud-2"></div>
        <div class="cloud cloud-3"></div>
        <div class="floating-circle c1"></div>
        <div class="floating-circle c2"></div>
        <div class="floating-circle c3"></div>
    </div>
    <div class="hero-content">
        <div class="hero-badge">✨ Kalkulator Kesehatan Digital</div>
        <h1 class="hero-title">
            Kenali <span class="gradient-text">Indeks Massa</span><br>
            Tubuh Anda
        </h1>
        <p class="hero-subtitle">
            Hitung BMI Anda secara akurat dan dapatkan rekomendasi kesehatan personal
            berdasarkan standar WHO Asia Pasifik
        </p>
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">WHO</span>
                <span class="stat-label">Standar Resmi</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-number">5</span>
                <span class="stat-label">Kategori BMI</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label">Gratis</span>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: DEFINISI BMI -->
<section class="info-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">📖 Pengetahuan Dasar</span>
            <h2 class="section-title">Apa itu BMI?</h2>
            <p class="section-subtitle">Pahami Body Mass Index sebelum menghitung</p>
        </div>
        <div class="info-grid">
            <div class="info-card featured">
                <div class="info-card-icon">⚖️</div>
                <h3>Definisi BMI</h3>
                <p>BMI atau Indeks Massa Tubuh adalah angka yang menunjukkan apakah berat badan seseorang sudah sesuai dengan tinggi badannya.
                    Semakin tinggi angka BMI, semakin besar kemungkinan seseorang mengalami kelebihan lemak tubuh yang dapat memicu penyakit.</p>
                <div class="formula-box">
                    <span class="formula">BMI = Berat (kg) ÷ Tinggi² (m)</span>
                    <p style="font-size:0.8rem; color:#0369a1; margin-top:0.5rem;">
                        Contoh: Berat 60kg, Tinggi 1,65m<br>
                        BMI = 60 ÷ (1,65 × 1,65) = <strong>22,0</strong>
                    </p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-card-icon">🎯</div>
                <h3>Tujuan Pengukuran</h3>
                <p>BMI digunakan sebagai alat skrining awal untuk mengidentifikasi potensi masalah berat badan
                    yang dapat menyebabkan risiko kesehatan seperti diabetes, penyakit jantung, dan hipertensi.</p>
            </div>
            <div class="info-card">
                <div class="info-card-icon">🌏</div>
                <h3>Standar Asia Pasifik</h3>
                <p>Aplikasi ini menggunakan standar WHO Asia Pasifik, karena orang Asia sudah berisiko terkena penyakit
                    pada angka BMI yang lebih rendah dibandingkan orang Eropa. Itulah mengapa batas kategori BMI untuk Asia lebih ketat.</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: KATEGORI BMI -->
<section class="category-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">📊 Klasifikasi</span>
            <h2 class="section-title">Kategori BMI</h2>
        </div>
        <div class="category-table">
            <div class="cat-row header">
                <span>Kategori</span>
                <span class="center">Nilai BMI</span>
                <span class="center">Status</span>
            </div>
            <div class="cat-row biru">
                <span>🔵 Berat Badan Kurang</span>
                <span class="center">&lt; 18.5</span>
                <span class="center">Perlu Penanganan</span>
            </div>
            <div class="cat-row hijau">
                <span>🟢 Normal</span>
                <span class="center">18.5 – 22.9</span>
                <span class="center">Ideal ✓</span>
            </div>
            <div class="cat-row kuning">
                <span>🟡 Kelebihan Berat Badan</span>
                <span class="center">23.0 – 24.9</span>
                <span class="center">Waspada</span>
            </div>
            <div class="cat-row oranye">
                <span>🟠 Obesitas Tingkat I</span>
                <span class="center">25.0 – 29.9</span>
                <span class="center">Risiko Tinggi</span>
            </div>
            <div class="cat-row merah">
                <span>🔴 Obesitas Tingkat II</span>
                <span class="center">≥ 30.0</span>
                <span class="center">Risiko Sangat Tinggi</span>
            </div>
        </div>
</section>

<!-- FORM HITUNG BMI -->
<section class="form-section" id="hitung">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">🔢 Kalkulator</span>
            <h2 class="section-title">Hitung BMI Anda</h2>
            <p class="section-subtitle">Isi data di bawah ini untuk mendapatkan hasil akurat</p>
        </div>
        <div class="form-wrapper">
            <form action="<?= base_url('/bmi/hitung') ?>" method="POST" class="bmi-form" id="bmiForm">
                <?= csrf_field() ?>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nama">👤 Nama (Opsional)</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="usia">🎂 Usia (Tahun)</label>
                        <input type="number" id="usia" name="usia" placeholder="Contoh: 25" min="5" max="120" class="form-input" required>
                    </div>
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

                <div class="form-row">
                    <div class="form-group">
                        <label for="berat">⚖️ Berat Badan (kg)</label>
                        <div class="input-with-unit">
                            <input type="number" id="berat" name="berat" placeholder="Contoh: 65"
                                min="10" max="300" step="0.1" class="form-input" required oninput="hitungPreview()">
                            <span class="unit-badge">kg</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tinggi">📏 Tinggi Badan (cm)</label>
                        <div class="input-with-unit">
                            <input type="number" id="tinggi" name="tinggi" placeholder="Contoh: 165"
                                min="50" max="250" class="form-input" required oninput="hitungPreview()">
                            <span class="unit-badge">cm</span>
                        </div>
                    </div>
                </div>

                <div class="bmi-preview" id="bmiPreview" style="display:none;">
                    <div class="preview-label">Estimasi BMI Anda:</div>
                    <div class="preview-value" id="previewValue">—</div>
                    <div class="preview-kategori" id="previewKategori">—</div>
                </div>

                <button type="submit" class="btn-hitung" id="submitBtn">
                    <span class="btn-icon">🔍</span>
                    <span class="btn-text">Hitung BMI Saya</span>
                    <span class="btn-arrow">→</span>
                </button>
            </form>
        </div>
    </div>
</section>

<!-- SECTION: MANFAAT -->
<section class="manfaat-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">💡 Manfaat</span>
            <h2 class="section-title">Manfaat Mengetahui BMI</h2>
        </div>
        <div class="manfaat-grid">
            <div class="manfaat-card">
                <div class="manfaat-icon">🏥</div>
                <h4>Deteksi Dini</h4>
                <p>Mendeteksi potensi masalah berat badan sejak awal sebelum berkembang menjadi penyakit serius</p>
            </div>
            <div class="manfaat-card">
                <div class="manfaat-icon">📋</div>
                <h4>Panduan Diet</h4>
                <p>Memberikan dasar yang jelas untuk merancang program diet dan nutrisi yang tepat</p>
            </div>
            <div class="manfaat-card">
                <div class="manfaat-icon">🏃</div>
                <h4>Program Olahraga</h4>
                <p>Membantu menentukan jenis dan intensitas olahraga yang sesuai dengan kondisi tubuh</p>
            </div>
            <div class="manfaat-card">
                <div class="manfaat-icon">💊</div>
                <h4>Konsultasi Medis</h4>
                <p>Memberikan data awal yang berguna saat berkonsultasi dengan dokter atau ahli gizi</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: CATATAN PENTING -->
<section class="catatan-section">
    <div class="container">
        <div class="catatan-box">
            <div class="catatan-icon">⚠️</div>
            <div class="catatan-content">
                <h3>Catatan Penting</h3>
                <ul>
                    <li>BMI adalah alat skrining, bukan alat diagnostik langsung</li>
                    <li>BMI tidak membedakan antara massa otot dan lemak tubuh </li>
                    <li>Atlet bisa memiliki BMI tinggi meski sehat</li>
                    <li>Hasil BMI perlu dikombinasikan dengan pemeriksaan medis lainnya</li>
                    <li>Untuk anak-anak dan lansia, interpretasi BMI menggunakan grafik pertumbuhan yang berbeda</li>
                    <li>Selalu konsultasikan hasil dengan tenaga kesehatan profesional</li>
                </ul>
            </div>
        </div>
    </div>
</section>