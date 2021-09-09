
<?php

mysqli_query($db,"DELETE FROM produk WHERE id_produk='$_GET[id]'");
echo "<script>alert('Data Produk berhasil Di Hapus');</script>";
echo "<script>location='index.php?Halaman=Produk';</script>";
     
    
?>
