<!DOCTYPE html>
<html>
<head>

<title>Proses Pembayaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f7fc;">

<div class="container mt-5">

<div class="card shadow-lg mx-auto"
style="max-width:700px;border-radius:20px;">

<div class="card-body p-5">

<h2 class="text-center mb-4">
💳 EDUXCHANGE PAYMENT
</h2>

<hr>

<h5>Kursus</h5>
<p>Pemrograman</p>

<h5>Harga</h5>
<p class="text-success fw-bold">
Rp 79.000
</p>

<h5>Metode Pembayaran</h5>
<p>E-Wallet</p>

<h5>Status</h5>

<span class="badge bg-warning text-dark fs-6">
⏳ Menunggu Pembayaran
</span>

<hr>

<h5>Batas Pembayaran</h5>

<p>
24 Jam Setelah Pemesanan
</p>

<a
href="{{ route('payment.success') }}"
class="btn btn-success w-100 mt-4">

Saya Sudah Bayar

</a>

</div>

</div>

</div>

</body>
</html>