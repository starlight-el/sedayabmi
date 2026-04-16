// === Real-time BMI Preview ===
function hitungPreview() {
    const berat = parseFloat(document.getElementById('berat')?.value);
    const tinggi = parseFloat(document.getElementById('tinggi')?.value);
    const preview = document.getElementById('bmiPreview');
    const previewValue = document.getElementById('previewValue');
    const previewKategori = document.getElementById('previewKategori');

    if (berat > 0 && tinggi > 0) {
        const tinggiM = tinggi / 100;
        const bmi = (berat / (tinggiM * tinggiM)).toFixed(1);

        let kategori = '';
        let color = '';
        if (bmi < 18.5) { kategori = '🔵 Berat Badan Kurang'; color = '#3b82f6'; }
        else if (bmi < 23) { kategori = '🟢 Normal - Ideal!'; color = '#22c55e'; }
        else if (bmi < 25) { kategori = '🟡 Kelebihan Berat Badan'; color = '#eab308'; }
        else if (bmi < 30) { kategori = '🟠 Obesitas Tingkat I'; color = '#f97316'; }
        else { kategori = '🔴 Obesitas Tingkat II'; color = '#ef4444'; }

        previewValue.textContent = bmi;
        previewValue.style.color = color;
        previewKategori.textContent = kategori;
        previewKategori.style.color = color;
        preview.style.display = 'block';
    } else {
        if (preview) preview.style.display = 'none';
    }
}

// === Animate Progress Bars on Result Page ===
document.addEventListener('DOMContentLoaded', function () {

    // Animate risk progress bar
    const progressFill = document.querySelector('.risk-progress-fill');
    if (progressFill) {
        const target = progressFill.getAttribute('data-target');
        setTimeout(() => {
            progressFill.style.width = target + '%';
        }, 300);
    }

    // Animate scale pointer
    const scalePointer = document.querySelector('.scale-pointer');
    if (scalePointer) {
        const startLeft = scalePointer.style.left;
        scalePointer.style.left = '0%';
        scalePointer.style.transition = 'left 1.2s cubic-bezier(0.34,1.56,0.64,1)';
        setTimeout(() => {
            scalePointer.style.left = startLeft;
        }, 300);
    }

    // Smooth scroll to anchor
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Entrance animation for cards
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.info-card, .manfaat-card, .diagnosis-card, .type-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });

    // Button ripple effect
    document.querySelectorAll('.btn-hitung').forEach(btn => {
        btn.addEventListener('click', function (e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            ripple.style.cssText = `
                position: absolute;
                width: 20px; height: 20px;
                background: rgba(255,255,255,0.4);
                border-radius: 50%;
                top: ${e.clientY - rect.top - 10}px;
                left: ${e.clientX - rect.left - 10}px;
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    });
});

// Ripple keyframe via JS
const style = document.createElement('style');
style.textContent = `
@keyframes ripple {
    from { transform: scale(1); opacity: 1; }
    to { transform: scale(8); opacity: 0; }
}`;
document.head.appendChild(style);