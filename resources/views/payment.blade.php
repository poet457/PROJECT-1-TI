<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pembayaran EDUXCHANGE</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f7fc;
}

.payment-card{
    max-width:900px;
    margin:auto;
    margin-top:50px;
    border-radius:20px;
}

.payment-option{
    border:1px solid #ddd;
    border-radius:15px;
    padding:20px;
    margin-bottom:15px;
    cursor:pointer;
    transition:.3s;
}

.payment-option:hover{
    background:#eef4ff;
    border-color:#0d6efd;
}

.payment-option input{
    transform:scale(1.2);
    margin-right:10px;
}

.payment-detail{
    display:none;
    background:#f8fafc;
    border-radius:15px;
    padding:20px;
    margin-top:10px;
    border:1px solid #dee2e6;
}

</style>

</head>

<body>

<div class="container">

<div class="card payment-card shadow">

<div class="card-body p-5">

<h2 class="text-center mb-3">
💳 Pembayaran EDUXCHANGE
</h2>

<p class="text-center text-muted mb-4">
Pilih metode pembayaran yang tersedia
</p>

<form>

<label class="payment-option d-block">

<input
type="radio"
name="payment_method"
onclick="showDetail('bank')">

🏦 <strong>Transfer Bank</strong>

<br>

<small>
BCA • BRI • BNI • Mandiri
</small>

</label>

<div id="bank" class="payment-detail">

<h5>Transfer Bank</h5>

<p class="mb-1">
Bank BCA
</p>

<p class="fw-bold">
1234567890
</p>

<p>
a.n EDUXCHANGE INDONESIA
</p>

</div>

<label class="payment-option d-block">

<input
type="radio"
name="payment_method"
onclick="showDetail('qris')">

📱 <strong>QRIS</strong>

<br>

<small>
Scan QR menggunakan aplikasi pembayaran favorit Anda
</small>

</label>

<div id="qris" class="payment-detail">

<h5>QRIS</h5>

<img
src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=EDUXCHANGE"
class="img-fluid"
width="250">

<p class="mt-3">
Scan QR menggunakan DANA, OVO, GoPay, ShopeePay atau Mobile Banking.
</p>

</div>

<label class="payment-option d-block">

<input
type="radio"
name="payment_method"
onclick="showDetail('ewallet')">

💳 <strong>E-Wallet</strong>

<br>

<small>
DANA • OVO • GoPay • ShopeePay
</small>

</label>

<div id="ewallet" class="payment-detail">

<h5>E-Wallet</h5>

<ul>
<li>DANA : 081234567890</li>
<li>OVO : 081234567890</li>
<li>GoPay : 081234567890</li>
<li>ShopeePay : 081234567890</li>
</ul>

</div>

<label class="payment-option d-block">

<input
type="radio"
name="payment_method"
onclick="showDetail('mbanking')">

📲 <strong>Mobile Banking</strong>

<br>

<small>
Pembayaran langsung melalui aplikasi m-banking
</small>

</label>

<div id="mbanking" class="payment-detail">

<h5>Mobile Banking</h5>

<p>
Transfer melalui aplikasi mobile banking Anda ke rekening:
</p>

<ul>
<li>BCA : 1234567890</li>
<li>BRI : 9876543210</li>
<li>BNI : 1122334455</li>
<li>Mandiri : 5566778899</li>
</ul>

</div>

<hr>

<a href="{{ url('/') }}"
class="btn btn-success w-100">
Konfirmasi Pembayaran
</a>

<a
href="/"
class="btn btn-outline-secondary w-100 mt-3">
Kembali ke Beranda
</a>

</form>

</div>

</div>

</div>

<script>

function showDetail(id){

    document.querySelectorAll('.payment-detail')
    .forEach(function(item){

        item.style.display = 'none';

    });

    document.getElementById(id)
    .style.display = 'block';

}

</script>

</body>
</html>