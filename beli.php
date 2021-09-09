
<?php
session_start();
$id_produk=$_GET['id'];
//Jika sudah ada di keranjang maka akan +1
if (isset($_SESSION['keranjang'][$id_produk])) 
{
    $_SESSION['keranjang'][$id_produk]+=1;

}
else
//Jika belum ada maka beli 1
    {
        $_SESSION['keranjang'][$id_produk]=1;
    }
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
echo "<script>alert('Produk Ditambahkan Ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>