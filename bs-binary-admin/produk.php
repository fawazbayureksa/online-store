<style type="text/css">
h3
{
  text-align: right;
   }
</style>
<h2>Daftar Produk </h2>
<h3><a href="index.php?Halaman=tambahproduk" class="btn btn-primary">Tambah</a></h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Foto Produk</th>
            <th>Deskripsi Produk</th>
            <th >aksi</td>
        </tr>
    </thead>
        <tbody>
        <?php $no=1;?>
        <?php $query = mysqli_query($db,"SELECT * FROM produk");?>
        <?php while($data = mysqli_fetch_assoc($query)) {?>
                <tr>

                <td><?php echo $no;?></td>
                <td><?php echo $data['nama_produk'];?></td>
                <td>Rp <?php echo number_format ($data['harga_produk']);?></td>
                <td><img src="../fotoproduk/<?php echo $data['foto_produk'];?>" width="100"></td>
                <td width="200"><?php echo $data['deskripsi_produk'];?></td>
                <td>
                     <a href="index.php?Halaman=hapusproduk&id=<?php echo $data['id_produk'];?>" class="btn-danger btn">hapus</a>
                     <a href="index.php?Halaman=ubahproduk&id=<?php echo $data['id_produk'];?>" class="btn btn-warning">Ubah</a>
                 </td>
            </tr>
       <?php $no++; }?>
    </tbody>
</table>