<?php
include 'database.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Akun </title>
    <!-- BOOTSTRAP STYLES-->
    <link href="bs-binary-admin/assets/css/bootstrap.css" rel="stylesheet" />
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Nama Lengkap</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="" class="control-label col-md-3">Alamat</label>
                            <div class="col-md-7">
                                <textarea name="alamat" class="form-control" required></textarea>
                            </div>

                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Nomor Telepon</label>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="telepon_pelanggan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" name="daftar">Daftar Sekarang</button> 
                            </div>
                        </form>
                        <?php
                            if (isset($_POST['daftar'])) 
                            {
                                $nama=$_POST['nama'];
                                $alamat_pelanggan=$_POST['alamat'];
                                $email=$_POST['email'];
                                $telepon_pelanggan=$_POST['telepon_pelanggan'];
                                $password=$_POST['password'];
                                //mencocokkan data apakah ada data yang sudah ada sebelumnya
                                $query = mysqli_query($db,"SELECT*FROM pelanggan where email='$email'");
                                $cek=mysqli_num_rows($query);
                                if ($cek==1)
                                {
                                    
                                    echo "<script>alert('Email sudah digunakan');</script>";
                                    echo "<script>location='daftar.php';</script>";
                                }
                                else
                                {
                                //memasukkan ke db
                                $query = mysqli_query($db, "INSERT INTO pelanggan
                                (email,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan)   
                                VALUES ('$email','$password','$nama','$telepon_pelanggan','$alamat_pelanggan')");

                                    echo "<script>alert('Pendaftaran Berhasil');</script>";
                                   echo "<script>location='login.php';</script>";
                                }    
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>