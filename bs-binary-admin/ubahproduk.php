<h2>Ubah Produk</h2>
<?php
$query = mysqli_query($db,"SELECT*FROM Produk
    WHERE id_produk='$_GET[id]'"); 
   $data = $query->fetch_assoc();?>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
    <label>Nama Produk</label>
    <input type="text" class="form-control" name="nama_produk" value="<?php echo $data['nama_produk']; ?>">
</div>
<div class="form-group">
    <label>Harga</label>
    <input type="number" class="form-control" name="harga_produk" value="<?php echo $data['harga_produk'];?>">
</div>
<div class="form-group">
    <label>Deskripsi Produk</label>
    <textarea type="text" class="form-control" name="deskripsi_produk" rows="5"><?php echo $data['deskripsi_produk'];?></textarea>

 <div class="form-group">
    <label>Foto Produk</label>
    <input type="file" class="form-control" name="foto_produk">
    <img src="../fotoproduk/<?php echo $data['foto_produk'];?>"width="120">
</div>
</form>

<button class="btn btn-primary" name="edit">Edit</button>
<?php
if (isset($_POST['edit']))
{
    $nama = $_FILES['foto_produk']['name'];
    $lokasi= $_FILES['foto_produk']['tmp_name'];
    move_uploaded_file($lokasi,"../fotoproduk/".$nama);
    $query = mysqli_query($db,"UPDATE produk SET nama_produk='$_POST[nama_produk]',
                                                 harga_produk='$_POST[harga_produk]',
                                                 deskripsi_produk='$_POST[deskripsi_produk]',
                                                 foto_produk='$nama'
                                                 WHERE id_produk='$_GET[id])'");
    }
    

?>
