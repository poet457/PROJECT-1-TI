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
            font-family:'Segoe UI',sans-serif;
        }

        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
            background:linear-gradient(135deg,#4f46e5,#06b6d4);
            color:white;
        }

        .hero-title{
            font-size:60px;
            font-weight:800;
            line-height:1.2;
        }

        .hero-subtitle{
            font-size:20px;
            opacity:.9;
        }

        .feature-card{
            border:none;
            border-radius:24px;
            transition:.3s;
        }

        .feature-card:hover{
            transform:translateY(-8px);
        }

        .course-card{
            border:none;
            border-radius:24px;
            overflow:hidden;
            transition:.3s;
        }

        .course-card:hover{
            transform:translateY(-10px);
        }

        .course-cover{
            background:linear-gradient(135deg,#4f46e5,#06b6d4);
            color:white;
            text-align:center;
            padding:40px 20px;
        }

        .course-icon{
            font-size:55px;
        }

        .price{
            color:#4f46e5;
            font-size:24px;
            font-weight:bold;
        }

        .badge-category{
            background:#e0e7ff;
            color:#4338ca;
            padding:8px 12px;
            border-radius:20px;
            font-size:12px;
        }

        .section-title{
            font-size:42px;
            font-weight:700;
        }

        footer{
            background:#111827;
        }

    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">

        <div class="container">

            <a class="navbar-brand fw-bold text-primary fs-3" href="#">
                🎓 EDUXCHANGE
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

    <!-- HERO -->
    <section class="hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h1 class="hero-title">
                        Belajar Tanpa Batas 🚀
                    </h1>

                    <p class="hero-subtitle mt-4">
                        Temukan tutor terbaik, ikuti kursus berkualitas, dan bangun masa depanmu bersama EDUXCHANGE.
                    </p>

                    <div class="mt-4">

                        <a href="{{ route('register') }}" class="btn btn-light btn-lg me-2">
                            Mulai Belajar
                        </a>

                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                            Cari Tutor
                        </a>

                    </div>

                </div>

                <div class="col-lg-6 text-center">

                    <img
                        src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
                        width="350">

                </div>

            </div>

        </div>

    </section>

    <!-- FITUR -->
    <section class="py-5 bg-white">

        <div class="container">

            <h2 class="section-title text-center mb-5">
                Mengapa Memilih EDUXCHANGE?
            </h2>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="card feature-card shadow p-4 h-100">

                        <h3>🎓 Tutor Berkualitas</h3>

                        <p class="text-muted mt-3">
                            Temukan tutor terbaik sesuai kebutuhan dan bidang keahlianmu.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card feature-card shadow p-4 h-100">

                        <h3>📚 Materi Digital</h3>

                        <p class="text-muted mt-3">
                            Belajar kapan saja dengan materi yang selalu tersedia secara online.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card feature-card shadow p-4 h-100">

                        <h3>💳 Transaksi Aman</h3>

                        <p class="text-muted mt-3">
                            Sistem pembayaran mudah, aman, dan terintegrasi.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- KURSUS POPULER -->
    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="section-title">
                    🔥 Kursus Populer
                </h2>

                <p class="text-muted">
                    Kursus yang paling banyak diminati siswa EDUXCHANGE.
                </p>

            </div>

            <div class="row g-4">

                @forelse ($popularCourses as $course)

                    <div class="col-lg-4 col-md-6">

                        <div class="card course-card shadow-lg h-100">

                            <!-- COVER -->
                            <div class="course-cover">

                                <div class="course-icon">
                                    🎓
                                </div>

                                <h4 class="fw-bold mt-3">
                                    {{ $course->nama_kursus }}
                                </h4>

                            </div>

                            <!-- CONTENT -->
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center mb-3">

                                    <span class="badge-category">
                                        {{ $course->kategori ?? 'Kursus' }}
                                    </span>

                                    <span class="text-warning fw-bold">
                                        ⭐ Populer
                                    </span>

                                </div>

                                <p class="text-muted small mb-2">
                                    👨‍🏫 {{ $course->tutor->user->name ?? 'Tutor EDUXCHANGE' }}
                                </p>

                                <p class="text-secondary">

                                    {{ \Illuminate\Support\Str::limit(
                                        $course->deskripsi ??
                                        'Pelajari keterampilan baru bersama tutor terbaik EDUXCHANGE.',
                                        100
                                    ) }}

                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-4">

                                    <div class="price">
                                        Rp {{ number_format($course->harga,0,',','.') }}
                                    </div>

                                    <span class="badge bg-success">
                                        {{ $course->transactions_count ?? 0 }}
                                        Transaksi
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-info text-center">

                            <h4>📚 Belum Ada Kursus</h4>

                            <p class="mb-0">
                                Kursus populer akan muncul setelah tutor menambahkan kursus.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="py-5 text-white"
             style="background:linear-gradient(135deg,#4f46e5,#06b6d4);">

        <div class="container text-center">

            <h2 class="fw-bold">
                Siap Meningkatkan Skill Anda?
            </h2>

            <p class="mt-3">
                Bergabunglah bersama komunitas belajar EDUXCHANGE sekarang juga.
            </p>

            <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                Daftar Sekarang
            </a>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="text-white text-center py-4">

        <p class="mb-0">
            © 2026 EDUXCHANGE — Belajar Tanpa Batas
        </p>

    </footer>

</body>

</html>