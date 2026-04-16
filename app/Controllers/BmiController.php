<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class BmiController extends BaseController
{
    public function index()
    {
        return view('layout/main', [
            'title'   => 'Kalkulator BMI',
            'content' => 'bmi/index'
        ]);
    }

    public function hitungBmi()
    {
        $berat = $this->request->getPost('berat');
        $tinggi = $this->request->getPost('tinggi');
        $nama   = $this->request->getPost('nama');
        $usia   = $this->request->getPost('usia');
        $gender = $this->request->getPost('gender');

        // Validasi input
        if (!$berat || !$tinggi || $tinggi <= 0) {
            return redirect()->to('/')->with('error', 'Input tidak valid!');
        }

        $tinggi_m = $tinggi / 100;
        $bmi = round($berat / ($tinggi_m * $tinggi_m), 1);

        // Kategori BMI (WHO Asia Pasifik)
        if ($bmi < 18.5) {
            $kategori    = 'Berat Badan Kurang';
            $warna       = 'biru';
            $deskripsi   = 'Berat badan Anda berada di bawah kisaran normal. Disarankan untuk meningkatkan asupan nutrisi.';
            $saran       = 'Konsultasikan dengan dokter atau ahli gizi untuk program penambahan berat badan yang sehat.';
            $icon        = '🔵';
            $level       = 1;
        } elseif ($bmi >= 18.5 && $bmi < 22.9) {
            $kategori    = 'Berat Badan Normal';
            $warna       = 'hijau';
            $deskripsi   = 'Selamat! Berat badan Anda berada dalam kisaran normal dan sehat.';
            $saran       = 'Pertahankan pola makan seimbang dan olahraga rutin minimal 30 menit per hari.';
            $icon        = '🟢';
            $level       = 2;
        } elseif ($bmi >= 23 && $bmi < 24.9) {
            $kategori    = 'Kelebihan Berat Badan';
            $warna       = 'kuning';
            $deskripsi   = 'Berat badan Anda sedikit di atas normal. Perlu perhatian lebih terhadap pola makan.';
            $saran       = 'Kurangi konsumsi makanan tinggi kalori dan perbanyak aktivitas fisik.';
            $icon        = '🟡';
            $level       = 3;
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $kategori    = 'Obesitas Tingkat I';
            $warna       = 'oranye';
            $deskripsi   = 'Anda mengalami obesitas tingkat I. Risiko penyakit kronis meningkat.';
            $saran       = 'Segera konsultasikan dengan dokter dan mulai program diet + olahraga terstruktur.';
            $icon        = '🟠';
            $level       = 4;
        } else {
            $kategori    = 'Obesitas Tingkat II';
            $warna       = 'merah';
            $deskripsi   = 'Anda mengalami obesitas tingkat II. Risiko penyakit serius sangat tinggi.';
            $saran       = 'Segera konsultasikan dengan dokter spesialis untuk penanganan medis yang tepat.';
            $icon        = '🔴';
            $level       = 5;
        }

        $data = [
            'title'      => 'Hasil BMI',
            'content'    => 'bmi/result',
            'nama'       => $nama ?: 'Pengguna',
            'usia'       => $usia,
            'gender'     => $gender,
            'berat'      => $berat,
            'tinggi'     => $tinggi,
            'bmi'        => $bmi,
            'kategori'   => $kategori,
            'warna'      => $warna,
            'deskripsi'  => $deskripsi,
            'saran'      => $saran,
            'icon'       => $icon,
            'level'      => $level,
        ];

        return view('layout/main', $data);
    }

    public function diabetes()
    {
        return view('layout/main', [
            'title'   => 'Risiko Diabetes',
            'content' => 'diabetes/index'
        ]);
    }

    public function hitungDiabetes()
    {
        $usia          = (int) $this->request->getPost('usia');
        $gender        = $this->request->getPost('gender');
        $bmi_val       = (float) $this->request->getPost('bmi');
        $riwayat       = $this->request->getPost('riwayat');      // ya/tidak
        $tekanan_darah = $this->request->getPost('tekanan_darah'); // ya/tidak
        $aktivitas     = $this->request->getPost('aktivitas');     // aktif/kurang/tidak
        $merokok       = $this->request->getPost('merokok');       // ya/tidak
        $gula          = $this->request->getPost('gula');          // ya/tidak

        // Sistem skor risiko
        $skor = 0;

        if ($usia >= 45 && $usia < 55) $skor += 2;
        elseif ($usia >= 55 && $usia < 65) $skor += 3;
        elseif ($usia >= 65) $skor += 4;

        if ($bmi_val >= 23 && $bmi_val < 25) $skor += 1;
        elseif ($bmi_val >= 25 && $bmi_val < 30) $skor += 2;
        elseif ($bmi_val >= 30) $skor += 3;

        if ($riwayat === 'ya') $skor += 3;
        if ($tekanan_darah === 'ya') $skor += 2;
        if ($merokok === 'ya') $skor += 1;
        if ($gula === 'ya') $skor += 2;

        if ($aktivitas === 'kurang') $skor += 1;
        elseif ($aktivitas === 'tidak') $skor += 2;

        // Tentukan level risiko
        if ($skor <= 3) {
            $risiko      = 'Risiko Rendah';
            $warna       = 'hijau';
            $persen      = min(25, $skor * 6);
            $deskripsi   = 'Risiko Anda terkena diabetes terbilang rendah. Tetap jaga gaya hidup sehat!';
            $icon        = '😊';
            $saran_list  = [
                'Pertahankan pola makan sehat dan bergizi seimbang',
                'Olahraga rutin minimal 150 menit per minggu',
                'Lakukan pemeriksaan gula darah setahun sekali',
                'Jaga berat badan ideal',
            ];
        } elseif ($skor <= 6) {
            $risiko      = 'Risiko Sedang';
            $warna       = 'kuning';
            $persen      = min(50, 25 + $skor * 3);
            $deskripsi   = 'Anda memiliki beberapa faktor risiko diabetes. Perlu perhatian dan gaya hidup lebih sehat.';
            $icon        = '😐';
            $saran_list  = [
                'Kurangi konsumsi gula dan karbohidrat olahan',
                'Tingkatkan aktivitas fisik secara bertahap',
                'Periksa gula darah setiap 6 bulan',
                'Konsultasikan dengan dokter umum',
            ];
        } elseif ($skor <= 10) {
            $risiko      = 'Risiko Tinggi';
            $warna       = 'oranye';
            $persen      = min(75, 50 + $skor * 2);
            $deskripsi   = 'Risiko Anda cukup tinggi. Segera ambil langkah pencegahan yang serius.';
            $icon        = '😟';
            $saran_list  = [
                'Segera konsultasikan dengan dokter spesialis penyakit dalam',
                'Lakukan pemeriksaan HbA1c dan gula darah puasa',
                'Ikuti program diet khusus diabetes',
                'Kurangi atau hentikan merokok',
                'Monitor tekanan darah secara rutin',
            ];
        } else {
            $risiko      = 'Risiko Sangat Tinggi';
            $warna       = 'merah';
            $persen      = min(95, 75 + $skor);
            $deskripsi   = 'Risiko Anda sangat tinggi. Segera periksakan diri ke dokter!';
            $icon        = '😰';
            $saran_list  = [
                'SEGERA konsultasikan dengan dokter spesialis',
                'Lakukan pemeriksaan lengkap: gula darah, HbA1c, kolesterol',
                'Ikuti program pengelolaan diabetes secara ketat',
                'Perubahan gaya hidup drastis sangat diperlukan',
                'Pantau gula darah setiap hari',
            ];
        }

        $data = [
            'title'      => 'Hasil Risiko Diabetes',
            'content'    => 'diabetes/result',
            'usia'       => $usia,
            'gender'     => $gender,
            'bmi_val'    => $bmi_val,
            'skor'       => $skor,
            'risiko'     => $risiko,
            'warna'      => $warna,
            'persen'     => $persen,
            'deskripsi'  => $deskripsi,
            'icon'       => $icon,
            'saran_list' => $saran_list,
        ];

        return view('layout/main', $data);
    }
}
