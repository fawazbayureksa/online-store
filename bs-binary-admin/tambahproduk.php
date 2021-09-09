<h2>Tambah Produk </h2>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
    <label>Nama Produk</label>
    <input type="text" class="form-control" name="nama_produk">
</div>
<div class="form-group">
    <label>Harga</label>
    <input type="number" class="form-control" name="harga_produk">
</div>
<div class="form-group">
    <label>Deskripsi Produk</label>
    <textarea class="form-control" name="deskripsi_produk" rows="10"></textarea>
 <div class="form-group">
    <label>Foto Produk</label>
    <input type="file" class="form-control" name="foto_produk">
</div>
<button class="btn btn-primary" name="simpan">Simpan</button>

</form>
<?php 
if (isset($_POST['simpan']))
{
    $nama = $_FILES['foto_produk']['name'];
    $lokasi= $_FILES['foto_produk']['tmp_name'];
    move_uploaded_file($lokasi,"../fotoproduk/".$nama);
    $query=mysqli_query($db,"INSERT INTO produk 
    (nama_produk,harga_produk,deskripsi_produk,foto_produk)
    VALUES('$_POST[nama_produk]','$_POST[harga_produk]','$_POST[deskripsi_produk]','$nama')");
    
    
    echo "<div class='alert alert-info'>Data Berhasil Disimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?Halaman=Produk'>";


}
?>
