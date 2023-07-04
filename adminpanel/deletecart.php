<?php
     require "session.php";
     require "../koneksi.php";
     $query = mysqli_query($conn,"DELETE FROM cart WHERE id_product=" . $_GET['id_product']);
     header("location:cart.php");
     
?>