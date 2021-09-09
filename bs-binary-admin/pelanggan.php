<style type="text/css">
h3
{
  text-align: right;
   }
</style>
<h2> Data Departemen</h2>
<h3><a href="index.php?Halaman=tambahpelanggan" class="btn btn-primary">Tambah</a></h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Pelanggan</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
<tbody>
    <?php $no=1;?>
    <?php 
     $query = mysqli_query($db,"SELECT * FROM pelanggan"); ?>
    <?php while ($data = mysqli_fetch_assoc($query)){?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $data['nama_pelanggan'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['telepon_pelanggan'];?></td>
        <td>
                     <a href="index.php?Halaman=hapuspelanggan&id=<?php echo $data['id_pelanggan']; ?>" class="btn-danger btn">hapus</a>
                
        </td>
    </tr>
    <?php $no++; }?>
</tbody></table>
