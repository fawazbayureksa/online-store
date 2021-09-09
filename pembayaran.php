<?php
session_start();
include 'database.php';
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) 
{
    echo "<script>alert('Login dulu slur')</script>";
    echo "<script>location='index.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Belanja</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="bs-binary-admin/assets/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <p>Kirim Bukti Pembayaran</p>

        <div class="alert alert-info">Total tagihan anda <strong>Rp <?php //echo number_format($detpem['total_pembelian']); ?></strong></div>

        <form method="$_POST">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Foto Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti">
            </div>
            <button class="btn btn-primary" name="kirim">Kirim Bukti Pembayaran</button>
        </form>
    </div>
</body>
</html>