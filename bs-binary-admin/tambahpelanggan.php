<h2>Tambah Pelanggan </h2>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
    <label>Nama Pelanggan</label>
    <input type="text" class="form-control" name="nama_pelanggan">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email">
</div>
<div class="form-group">
    <label>No Telepon</label>
    <input type="number" class="form-control" name="notelp">

</div>
<button class="btn btn-primary" name="simpan">Simpan</button>

</form>
<?php 
if (isset($_POST['simpan']))
{
    $query=mysqli_query($db,"INSERT INTO pelanggan 
    (nama_pelanggan,notelp,email)
    VALUES('$_POST[nama_pelanggan]','$_POST[notelp]','$_POST[email]')");
    
    
    echo "<div class='alert alert-info'>Data Berhasil Disimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?Halaman=Pelanggan'>";


}
?>
