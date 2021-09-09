'<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "tokoonline";
$db = mysqli_connect($server, $username, $password, $database);
if (!$db) {
    die('koneksi Database Gagal :' . mysqli_connect_error());
}
?>