<?php
session_start();
include 'database.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="bs-binary-admin/assets/css/bootstrap.css" rel="stylesheet" />
</head>

<body>

    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2> Detail Pemesanan</h2>
        <?php
        $query = mysqli_query($db, "SELECT*FROM pembelian JOIN pelanggan 
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan 
    WHERE pembelian.id_pembelian='$_GET[id]'");
        $data = $query->fetch_assoc();
        ?>
        <!--<h1>data pembeli</h1>-->
        <!--<pre><?php //print_r($data) 
                    ?></pre>-->

        <!--<h1>Data orang Login</h1>-->
        <!--<pre><?php //print_r($_SESSION)
                    ?></pre>-->


        <!--- Jika pembelian tidak sama dengan data orang yang login maka riwayat tidak akan terbuka -->
        <!-- it means like pelanggan yang beli harus pelanggan yang login -->
        <?php
        //datapelangganbeli
        $a = $data['id_pelanggan'];
        //datapelanganlogin
        $b = $_SESSION['pelanggan']['id_pelanggan'];

        if ($a !== $b) {
            echo "<script>alert('id yang anda tulis kosong');</script>";
            echo "<script>location='riwayat.php';</script>";
            exit();
        }

        ?>



        <div class="row">
            <div class="col-md-4">
                <h3>Pembelian </h3>
                <strong>No Pesanan : <?php echo $data['id_pembelian']; ?> </strong>
                <h5>
                    Tanggal Pembelian : <?php echo $data['tanggal_pembelian']; ?> <br>
                </h5>
                Total Pembelian : Rp <?php echo number_format($data['total_pembelian']); ?>


            </div>
            <div class="col-md-4">
                <h3>Data Costumer</h3>
                <strong><?php echo $data['nama_pelanggan'] ?></strong></br>
                <h5>
                    Nomor Telepon : <?php echo $data['telepon_pelanggan']; ?> <br>
                    Email : <?php echo $data['email']; ?> <br>

                </h5>

            </div>
            <div class="col-md-4"></div>
            <h3>Pengiriman Barang</h3>
            <strong><?php echo $data['nama_kota'] ?></strong>
            Rp <?php echo number_format($data['tarif']); ?> </br>
            Alamat Lengkap : <?php echo $data['alamat_lengkap']; ?>


        </div>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Jumlah </th>
                    <th>Total Harga Barang </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $query = mysqli_query($db, "SELECT*FROM pembelian_produk where id_pembelian='$_GET[id]'"); ?>
                <?php while ($data = $query->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td>Rp <?php echo number_format($data['harga']); ?></td>
                        <td><?php echo $data['jumlah']; ?></td>
                        <td>Rp <?php echo number_format($data['subharga']); ?></td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                        Silahkan Lanjutkan Pembayaran <br>
                        <strong>BANK MANDIRI XXX-XXX-XXXX-XXX AN. XXXXXXXX</strong>
                    </p>

                </div>
            </div>
        </div>
    </div>
</body>

</html>