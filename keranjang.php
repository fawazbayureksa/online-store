<?php
session_start();
/*echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";*/
include 'database.php';
if (!isset($_SESSION["keranjang"])) {
    echo "<script>alert('Belum ada barang yang dipilih')</script>";
    echo "<script>location='index.php';</script>";
}
if (empty($_SESSION["keranjang"])) {
    echo "<script>alert('Belum ada barang yang dipilih')</script>";
    echo "<script>location='index.php';</script>";
}
?>

<!doctype html>
<html>

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bs-binary-admin/assets/css/bootstrap.css">
    <title>TOKO ONLINE</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <section class="konten">
    <<div class="container">
        <h1>Daftar Belanja</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Jumlah Pesanan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // foreach ($_SESSION["keranjang"] as $id=>$value):
                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) :
                    // Menampilkan produk yang sedang diperulangkan berdasarkan id produk
                    $query = mysqli_query($db, "SELECT * FROM produk 
                    where id_produk='$id_produk'");
                    $data = mysqli_fetch_assoc($query);
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_produk']; ?></td>
                        <td> Rp. <?php echo number_format($data['harga_produk']); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($data['harga_produk'] * $jumlah); ?></td>
                        <td>
                            <a href="hapusbelanja.php?id=<?php echo $data['id_produk'] ?>" class="btn btn-danger">Batal</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Lanjut Belanja</a>
        <a href="checkout.php" class="btn btn-success">Checkout</a>
        </div>

        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- MORRIS CHART SCRIPTS -->
        <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
        <script src="assets/js/morris/morris.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>
</body>

</html>