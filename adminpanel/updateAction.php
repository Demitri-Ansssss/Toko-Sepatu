<?php
require "session.php";
require "../koneksi.php";

$kategori = htmlspecialchars($_POST['kategori']);
$nama = htmlspecialchars($_POST['nama']);
$harga = htmlspecialchars($_POST['harga']);
$detail = htmlspecialchars($_POST['detail']);
$ukuran = htmlspecialchars($_POST['ukuran']);
$stok = htmlspecialchars($_POST['stok']);
$sq = "UPDATE produk SET kategori_id ='".$kategori."', nama ='".$nama."', harga ='".$harga."', detail ='".$detail."', ukuran ='".$ukuran."',stok ='".$stok."' WHERE id_product =".$_GET['id'];
mysqli_query($conn,$sq);

header("location:produk.php");