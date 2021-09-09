<?php
session_start();
include 'database.php';
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Login dulu slur')</script>";
    echo "<script>location='index.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat Belanja</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="bs-binary-admin/assets/css/bootstrap.css" rel="stylesheet" />
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="riwayat">
        <div class="container">
            <h3>Riwayat Belanja <?php print_r($_SESSION['pelanggan']['nama_pelanggan']); ?> </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // pelanggan yang login
                    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];

                    $query = mysqli_query($db, "SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                    while ($data = mysqli_fetch_assoc($query)) {

                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['tanggal_pembelian']; ?></td>
                            <td><?php echo $data['status_pembelian']; ?></td>
                            <td> Rp <?php echo  number_format($data['total_pembelian']); ?></td>
                            <td>

                                <a href="nota.php?id=<?php echo $data['id_pembelian']; ?>" class="btn btn-info">Nota</a>
                                <a href="pembayaran.php?id=<?php echo $data['id_pembelian'];?>" class="btn btn-success">Pembayaran</a>
                            </td>

                        <?php $no++;
                    } ?>
                        </tr>

                </tbody>
            </table>
        </div>
    </section>
</body>

</html>