<h2> Detail Pembelian</h2>
        <?php 
    $query = mysqli_query($db,"SELECT*FROM pembelian JOIN pelanggan 
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan 
    WHERE pembelian.id_pembelian='$_GET[id]'"); 
   $data = $query->fetch_assoc();
        ?>
    <strong><?php echo $data['nama_pelanggan'] ?></strong></br>
    <h5>
        Nomor Telepon : <?php echo $data['telepon_pelanggan'];?> <br>
        Email         : <?php echo $data['email'];?> <br>

    </h5>
    <h5> 
        Tanggal Pembelian :  <?php echo $data['tanggal_pembelian'];?> <br>
        Total Pembelian   :  Rp <?php echo number_format ($data['total_pembelian']);?> <br>
</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah </th>
                <th>Total Harga </th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;
             $query = mysqli_query($db,"SELECT*FROM pembelian_produk JOIN produk 
            ON pembelian_produk.id_produk=produk.id_produk
            WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
            <?php while($data=$query->fetch_assoc()){?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_produk'];?></td>
                <td>Rp <?php echo number_format ($data['harga_produk']);?></td>
                <td><?php echo $data['jumlah'];?></td>
                <td>Rp <?php echo number_format ($data['harga_produk']*$data['jumlah']);?></td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>