<?php
     require "session.php";
     require "../koneksi.php";
     $querydel = mysqli_query($conn,"DELETE FROM cart WHERE id=" . $_GET['id']);
     
     $queryInsert = mysqli_query($conn,"INSERT INTO transaksi
     VALUES ('','".$_GET['id']."', '".$_GET['total']."', null)");
     header("location:viewTransaksi.php");
     
?>