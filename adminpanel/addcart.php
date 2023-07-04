<?php 
require '../koneksi.php';
session_start();

var_dump($_SESSION);

mysqli_query($conn,"INSERT INTO cart VALUES ('', '".$_SESSION['id']."', '".$_GET['id']."')");
                    
header('location:cart.php');
?>