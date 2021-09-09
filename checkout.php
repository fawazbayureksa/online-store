<?php
session_start();
include 'database.php';
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan Login terlebih dahulu')</script>";
    echo "<script>location='login.php';</script>";
}
if (empty($_SESSION["keranjang"])) {
    echo "<script>alert('Belum ada barang yang dipilih')</script>";
    echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>

<head>
    <title>Checkout Barang </title>
    <!-- BOOTSTRAP STYLES-->
    <link href="bs-binary-admin/assets/css/bootstrap.css" rel="stylesheet" />
</head>

<body>
    <?php include 'navbar.php'; ?>
    <section class="konten"></section>
    <<div class="container">
        <h1>Daftar Belanja</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Jumlah Pesanan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $totalbelanja = 0;
                // foreach ($_SESSION["keranjang"] as $id=>$value):
                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) :
                    // Menampilkan produk yang sedang diperulangkan berdasarkan id produk
                    $query = mysqli_query($db, "SELECT * FROM produk 
            where id_produk='$id_produk'");
                    $data = mysqli_fetch_assoc($query);

                    $total = $data['harga_produk'] * $jumlah;

                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_produk']; ?></td>
                        <td> Rp. <?php echo number_format($data['harga_produk']); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($total); ?></td>
                    </tr>
                <?php $no++;
                    $totalbelanja += $total;
                endforeach ?>

                <th colspan="4">Total Harga Keseluruhan :</th>
                <td>Rp <?php echo number_format($totalbelanja); ?></td>
            </tbody>
        </table>
        </form>
        <form method="POST">
            <div class="form-row">
                <div class="col-md-3">
                    <input type="text" class="form-control" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" readonly value="<?php echo $_SESSION['pelanggan']['email']; ?>">
                </div>
                <div class="form-group col-md-3">
                    <select class="form-control" name="id_ongkir">
                        <option selected>Pilih Kota Pengiriman></option>
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM ongkir");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <option value="<?php echo $data['id_ongkir']; ?>">
                                <?php echo $data['nama_kota']; ?>
                                Rp <?php echo number_format($data['tarif']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="from-group col-md-7">
                <label>Alamat Pengiriman</label>
                <textarea name="alamat_lengkap" class="form-control" placeholder="Masukkan alamat Lengkap.."></textarea>
            </div>
            <button class="btn btn-success" name="checkout">Pesan Sekarang</button>
        </form>
        <?php
        if (isset($_POST['checkout'])) {
            $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
            $id_ongkir = $_POST['id_ongkir'];
            $tanggal_pembelian = date("Y-m-d");
            $alamat_lengkap = $_POST['alamat_lengkap'];

            $query = mysqli_query($db, "SELECT * FROM ongkir where id_ongkir='$id_ongkir'");
            $data = mysqli_fetch_assoc($query);

            $tarif = $data['tarif'];
            $total_pembelian = $totalbelanja + $tarif;
            $nama_kota = $data['nama_kota'];

            $query = mysqli_query($db, "INSERT INTO pembelian
             (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_lengkap)
            VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_lengkap')");
            $id_pembelianbarusan = $db->insert_id;


            // foreach ($_SESSION["keranjang"] as $id=>$value):
            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                // Menampilkan produk yang sedang diperulangkan berdasarkan id produk
                $query = mysqli_query($db, "SELECT * FROM produk where id_produk='$id_produk'");
                $data = mysqli_fetch_assoc($query);
                $nama = $data['nama_produk'];
                $harga = $data['harga_produk'];
                $subharga = $data['harga_produk'] * $jumlah;
                $query = mysqli_query($db, "INSERT INTO pembelian_produk
                    (id_pembelian,id_produk,jumlah,nama,harga,subharga)   
                    VALUES ('$id_pembelianbarusan','$id_produk','$jumlah','$nama','$harga','$subharga')");
            }

            //kosongkan keranjang
            unset($_SESSION["keranjang"]);

            echo "<script>alert('Pembelian berhasil');</script>";
            echo "<script>location='nota.php?id=$id_pembelianbarusan';</script>";
        }
        ?>

</body>

</html>