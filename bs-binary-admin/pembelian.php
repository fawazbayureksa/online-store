<h2>Data Pembelian </h2>
<table class="table table-bordered">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama pelanggan</th>
        <th>Tanggal Pembelian</th>
        <th>Total</th>
        <th>aksi</th>
        </tr>
    </thead>
<tbody>
    <?php $no=1; ?>
    <?php
     $query = mysqli_query($db,"SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");?>
    <?php while($data = mysqli_fetch_assoc($query)) {?>
    <tr>

        <td><?php echo $no; ?></td>
        <td><?php echo $data['nama_pelanggan'];?></td>
        <td><?php echo $data['tanggal_pembelian'];?></td>
        <td> Rp <?php echo number_format($data['total_pembelian']);?></td>
        <td>
                    
                     <a href="index.php?Halaman=detail&id=<?php echo $data['id_pembelian'];?>" class="btn btn-info">Detail</a>
        </td>
        
    </tr>
    <?php $no++; } ?>
</tbody>
</table>