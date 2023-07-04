<?php
    $conn = mysqli_connect("localhost","root","","toko_sepatu");

    if (mysqli_connect_error()) {
        echo("Connection failed: " . mysqli_connect_error());
        exit();
    }

?>