<?php
session_start();
include 'database.php';
?>
<!doctype html>
<html>

<head>

    <title>TOKO ONLINE</title>
        <!-- BOOTSTRAP STYLES-->
    <link href="bs-binary-admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="bs-binary-admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="bs-binary-admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="bs-binary-admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='bs-binary-admin/http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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