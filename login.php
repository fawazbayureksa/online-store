<?php
session_start();
include 'database.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="bs-binary-admin/assets/css/bootstrap.css" rel="stylesheet" />
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary" name="masuk">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST['masuk'])) {
        $query = mysqli_query($db, "SELECT * FROM pelanggan WHERE email='$_POST[email]' and password_pelanggan='$_POST[password]'");
        $cek = mysqli_num_rows($query);
        if ($cek == 1) {
            $_SESSION['pelanggan'] = mysqli_fetch_assoc($query);
            echo "<script>alert('Login Berhasil');</script>";
            //jika sudah ada produk yang dipilih
            if (isset($_SESSION['keranjang']) or  !empty($_SESSION['keranjang']))
             {
                 
                 echo "<script>location='checkout.php';</script>";
            }
            else
            {
                echo "<script>location='riwayat.php';</script>";
            }

        } else {
            echo "<script>alert('Login Gagal , Periksa akun anda');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    ?>
</body>

</html>