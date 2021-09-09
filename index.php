<?php
session_start();
include 'database.php';
?>
<!doctype html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <title>TOKO ONLINE</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <section class="konten">
        <div class="container">
            <h1>Produk Terbaru</h1>
            <div class="row">
                <?php $query = mysqli_query($db, "SELECT * FROM produk"); ?>
                <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="fotoproduk/<?php echo $data['foto_produk']; ?>" alt="">
                            <div class="caption">
                                <h4><?php echo $data['nama_produk']; ?></h4>
                                <H5>Rp. <?php echo  number_format($data['harga_produk']); ?></H5>
                                <a href="beli.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-primary">Buy</a>
                                <a href="detailproduk.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-info"> Detail Produk</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>

</html>