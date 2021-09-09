<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
</head>
<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="keranjang.php">Keranjang</a>
            </li>
            <?php if (isset($_SESSION['pelanggan'])) : ?>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="riwayat.php">Riwayat Belanja</a></li>
            <?php else : ?>
                <li>
                    <a href="login.php">Login</a>
                </li>
                <li>
                    <a href="daftar.php">Daftar</a>
                </li>
            <?php endif ?>

            <li>
                <a href="checkout.php">Checkout</a>
            </li>

        </ul>
    </div>
</nav>