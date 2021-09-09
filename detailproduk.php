<?php
session_start();
include 'database.php';

$id_produk = $_GET['id'];

$query = mysqli_query($db, "SELECT * FROM produk WHERE id_produk='$id_produk'");
$data = mysqli_fetch_assoc($query);
?>
<pre>
    <?php print_r($data); ?>
</pre>

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
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="fotoproduk/<?php echo $data['foto_produk']; ?>" alt="" class="img-responsive">
                </div>
                <form method="POST">
                    <div class="col-md-6">
                        <h2><?php echo $data['nama_produk']; ?></h2>
                        <h4>Rp <?php echo number_format($data['harga_produk']); ?></h4>
                        <p><?php echo $data['deskripsi_produk']; ?></p>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Buy</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>
            <?php
            if (isset($_POST['beli']))
            
            {
                //Get jumlah input
                $jumlah=$_POST['jumlah'];
                //masukkan ke session keranjang
                $_SESSION['keranjang'][$id_produk]=$jumlah;
           
           echo "<script>alert('Produk Dimasukkan Ke Keranjang');</script>";
           echo "<script>location='keranjang.php';</script>";
            }

            ?>





    </section>

</body>

</html>