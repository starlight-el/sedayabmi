<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - SedayaBMI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Sora:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?= base_url('/') ?>" class="nav-brand">
                <img src="<?= base_url('assets/img/logobmi.png') ?>" alt="SedayaBMI Logo" class="nav-logo" onerror="this.style.display='none'">
                <span class="brand-text">Sedaya<span class="brand-accent">BMI</span></span>
            </a>
            <div class="nav-links">
                <a href="<?= base_url('/') ?>" class="nav-link <?= (uri_string() == '' || uri_string() == '/') ? 'active' : '' ?>">
                    ⚖️ BMI
                </a>
                <a href="<?= base_url('/diabetes') ?>" class="nav-link <?= (strpos(uri_string(), 'diabetes') !== false) ? 'active' : '' ?>">
                    🩺 Risiko Diabetes
                </a>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="main-content">
        <?= view($content, get_defined_vars()) ?>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <span class="brand-text">Sedaya<span class="brand-accent">BMI</span></span>
                <p>Aplikasi Kesehatan Digital untuk Generasi Sehat</p>
            </div>
            <div class="footer-links">
                <a href="<?= base_url('/') ?>">Kalkulator BMI</a>
                <a href="<?= base_url('/diabetes') ?>">Risiko Diabetes</a>
            </div>
            <div class="footer-copy">
                <p>© 2026 SedayaBMI · Dibuat dengan ❤️ untuk kesehatan Indonesia</p>
                <p class="disclaimer">⚠️ Hasil kalkulasi bersifat informatif, bukan diagnosa medis. Konsultasikan dengan dokter.</p>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>