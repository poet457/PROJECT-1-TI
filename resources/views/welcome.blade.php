<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>EDUXCHANGE</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f8fafc;
}

.hero{
    min-height:90vh;
    display:flex;
    align-items:center;
}

.hero-title{
    font-size:60px;
    font-weight:bold;
}

.hero-subtitle{
    font-size:20px;
    color:#6b7280;
}

.feature-card{
    transition:.3s;
    border:none;
    border-radius:15px;
}

.feature-card:hover{
    transform:translateY(-5px);
}

.course-card{
    border:none;
    border-radius:20px;
    transition:.3s;
    height:100%;
}

.course-card:hover{
    transform:translateY(-8px);
}

.course-description{
    min-height:220px;
    text-align:justify;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">

<div class="container">

<a class="navbar-brand fw-bold text-primary" href="/">
EDUXCHANGE
</a>

<div>

<a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
Login
</a>

<a href="{{ route('register') }}" class="btn btn-primary">
Register
</a>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-md-6">

<h1 class="hero-title">
Belajar Mudah,<br>
Temukan Tutor<br>
Tanpa Batas
</h1>

<p class="hero-subtitle mt-3">
Marketplace pendidikan yang menghubungkan siswa dan tutor profesional dalam satu platform.
</p>

<div class="mt-4">

<a href="{{ route('register') }}" class="btn btn-primary btn-lg">
Mulai Belajar
</a>

<a href="#kursus" class="btn btn-outline-secondary btn-lg ms-2">
Lihat Kursus
</a>

</div>

</div>

<div class="col-md-6 text-center">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" width="350">

</div>

</div>

</div>

</section>

<section class="py-5 bg-white">

<div class="container">

<h2 class="text-center mb-5">
Mengapa Memilih EDUXCHANGE?
</h2>

<div class="row">

<div class="col-md-4">

<div class="card feature-card shadow p-4">

<h4>🎓 Tutor Profesional</h4>

<p>
Tutor berpengalaman dan terverifikasi.
</p>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card shadow p-4">

<h4>📚 Materi Lengkap</h4>

<p>
Materi dapat diakses kapan saja dan dimana saja.
</p>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card shadow p-4">

<h4>💳 Pembayaran Mudah</h4>

<p>
Mendukung Transfer Bank, QRIS, E-Wallet dan M-Banking.
</p>

</div>

</div>

</div>

</div>

</section>

<section id="kursus" class="py-5">

<div class="container">

<h2 class="text-center fw-bold mb-5">
🎓 Paket Tutor EDUXCHANGE
</h2>

<div class="row g-4">

<!-- Bahasa Inggris -->

<div class="col-lg-3 col-md-6">

<div class="card course-card shadow">

<div class="card-body d-flex flex-column">

<h4>🇬🇧 Bahasa Inggris</h4>

<p class="course-description">
Tingkatkan rasa percaya diri Anda dalam berkomunikasi di tingkat global. Kursus ini berfokus pada penguasaan tata bahasa, perluasan kosakata, serta praktik berbicara dan menulis yang efektif, mempersiapkan Anda untuk meraih berbagai peluang akademis dan profesional tanpa terhalang batasan bahasa.
</p>

<h3 class="text-primary">Rp 69.000</h3>

<p class="text-muted">per bulan</p>

<a href="{{ route('payment') }}" class="btn btn-primary mt-auto">
Pesan Sekarang
</a>

</div>

</div>

</div>

<!-- Pemrograman -->

<div class="col-lg-3 col-md-6">

<div class="card course-card shadow">

<div class="card-body d-flex flex-column">

<h4>💻 Pemrograman</h4>

<p class="course-description">
Bangun karir digital Anda dengan mempelajari logika dan bahasa pemrograman secara komprehensif. Mulai dari pemahaman sintaks dasar hingga pembuatan struktur dan interaktivitas aplikasi atau website, kursus ini akan memandu Anda selangkah demi selangkah menjadi seorang kreator teknologi yang siap bersaing di industri.
</p>

<h3 class="text-success">Rp 79.000</h3>

<p class="text-muted">per bulan</p>

<a href="{{ route('payment') }}" class="btn btn-success mt-auto">
Pesan Sekarang
</a>

</div>

</div>

</div>

<!-- Matematika -->

<div class="col-lg-3 col-md-6">

<div class="card course-card shadow">

<div class="card-body d-flex flex-column">

<h4>📐 Matematika</h4>

<p class="course-description">
Kuasai konsep matematika dari dasar hingga lanjutan dengan pendekatan yang interaktif dan mudah dipahami. Kursus ini dirancang khusus untuk menajamkan logika berpikir dan kemampuan problem-solving, membekali Anda dengan keterampilan analitis yang sangat berguna untuk memecahkan berbagai tantangan di dunia nyata.
</p>

<h3 class="text-danger">Rp 80.000</h3>

<p class="text-muted">per bulan</p>

<a href="{{ route('payment') }}" class="btn btn-danger mt-auto">
Pesan Sekarang
</a>

</div>

</div>

</div>

<!-- Desain Visual -->

<div class="col-lg-3 col-md-6">

<div class="card course-card shadow">

<div class="card-body d-flex flex-column">

<h4>🎨 Desain Visual</h4>

<p class="course-description">
Ubah ide imajinatif Anda menjadi karya visual yang memukau dan profesional. Pelajari prinsip-prinsip inti desain, tipografi, serta komposisi warna untuk menciptakan grafis yang tidak hanya estetis, tetapi juga mampu mengomunikasikan pesan dengan kuat untuk kebutuhan karir maupun portofolio Anda.
</p>

<h3 class="text-warning">Rp 79.000</h3>

<p class="text-muted">per bulan</p>

<a href="{{ route('payment') }}" class="btn btn-warning mt-auto">
Pesan Sekarang
</a>

</div>

</div>

</div>

</div>

</div>

</section>

<section class="py-5 bg-primary text-white">

<div class="container text-center">

<h2>
Siap Meningkatkan Skill Anda?
</h2>

<p class="mt-3">
Gabung bersama tutor dan siswa terbaik di EDUXCHANGE.
</p>

<a href="{{ route('register') }}" class="btn btn-light btn-lg">
Daftar Sekarang
</a>

</div>

</section>

<footer class="bg-dark text-white text-center p-4">

<p class="mb-0">
© 2026 EDUXCHANGE | Marketplace Pendidikan Digital
</p>

</footer>

</body>
</html>