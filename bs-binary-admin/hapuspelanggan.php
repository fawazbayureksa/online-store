<?php


mysqli_query($db,"DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

header("location:index.php");
     
    ?>