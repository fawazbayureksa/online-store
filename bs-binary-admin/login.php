<?php
session_start();
$server = "localhost";
$username ="root";
$password = "";
$database = "tokoonline";
$db = mysqli_connect($server, $username, $password, $database);
if (!$db) {
    die('koneksi Database Gagal :' . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /> <br />
                <h2>Toko Online : Login</h2>
                <h5>(Login Yourself To Get acces)</h5>
                <br />

            </div>

        </div>
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offest-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Enter Details To Login</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" class="form-control" name="user">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" />Remember me
                            </label>
                            <span class="pull-right">
                                <a href="#">Forget Password</a>
                            </span>
                        </div>
                        <button class="btn btn-primary" name="login">Masuk</button>
                        <hr />
                        Not Register ? <a href="registration.html">Click Here</a>
                        </form>
                        <?php   

                        if (isset($_POST['login'])) 
                            {
                            $query = mysqli_query ($db,"SELECT * FROM adminn WHERE username='$_POST[user]' and password='$_POST[pass]'");
                             $cek=mysqli_num_rows($query);
                             if ($cek==1)
                             {
                                 $_SESSION['adminn']=mysqli_fetch_assoc($query);
                                 echo "<script>alert('Login Berhasil');</script>";
                                 header('location: index.php?Halaman=home');
                             }
                             else
                             {
                                echo "<div class='alert alert-danger'>Login Gagal</div>";
                                 echo"<meta http.equiv='refresh' content='1;url=login.php'>";
                             }    
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>

</html>