<!DOCTYPE html>
<html lang="en">
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
            min-height:100vh;
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
            transition:0.3s;
            border:none;
            border-radius:15px;
        }

        .feature-card:hover{
            transform:translateY(-5px);
        }

        .course-card{
            border:none;
            border-radius:15px;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">

<div class="container">

<a class="navbar-brand fw-bold text-primary" href="#">
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
Temukan Tutor Tanpa Batas
</h1>

<p class="hero-subtitle mt-3">
Marketplace jasa pendidikan dan pembelajaran digital dalam satu platform.
</p>

<div class="mt-4">

<a href="{{ route('register') }}" class="btn btn-primary btn-lg">
Mulai Belajar
</a>

<a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg ms-2">
Cari Tutor
</a>

</div>

</div>

<div class="col-md-6 text-center">

<img
src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
width="350"
>

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

<h4>🎓 Tutor Berkualitas</h4>

<p>
Temukan tutor sesuai kebutuhan dan bidang keahlian.
</p>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card shadow p-4">

<h4>📚 Materi Digital</h4>

<p>
Akses materi pembelajaran kapan saja dan dimana saja.
</p>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card shadow p-4">

<h4>💳 Transaksi Aman</h4>

<p>
Pemesanan kursus dilakukan secara mudah dan terintegrasi.
</p>

</div>

</div>

</div>

</div>

</section>

<section class="py-5">

<div class="container">

<h2 class="text-center mb-5">
Kursus Populer
</h2>

<div class="row">

@forelse ($popularCourses as $course)

<div class="col-md-4">

<div class="card course-card shadow">

<div class="card-body">

<h4>{{ $course->nama_kursus }}</h4>

<p class="text-muted small mb-1">
Oleh {{ $course->tutor->user->name ?? 'Tutor EDUXCHANGE' }}
</p>

<p>
{{ $course->deskripsi ?? $course->kategori }}
</p>

<h5 class="text-primary">
Rp {{ number_format($course->harga, 0, ',', '.') }}
</h5>

</div>

</div>

</div>

@empty

<div class="col-12 text-center text-muted">
Belum ada kursus yang tersedia saat ini. Yuk jadi yang pertama mendaftar!
</div>

@endforelse

</div>

</div>

</section>

<section class="py-5 bg-primary text-white">

<div class="container text-center">

<h2>
Siap Meningkatkan Skill Anda?
</h2>

<p class="mt-3">
Gabung bersama ribuan pelajar dan tutor di EDUXCHANGE.
</p>

<a href="{{ route('register') }}" class="btn btn-light btn-lg">
Daftar Sekarang
</a>

</div>

</section>

<footer class="bg-dark text-white text-center p-4">

<p class="mb-0">
© 2026 EDUXCHANGE
</p>

</footer>
</body>
</html>