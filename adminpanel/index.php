<?php
    require "session.php";
    require "../koneksi.php";

    $querykategori = mysqli_query($conn,"SELECT * FROM kategori");
    $jumplahkategori = mysqli_num_rows($querykategori);

    $queryproduct = mysqli_query($conn,"SELECT * FROM produk");
    $jumplahproduct = mysqli_num_rows($queryproduct);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2/css/style.css">
   
    
    <style>
         .kotak{
            border: solid;
         }
         .sumary-kategori{
            background-color: darkcyan;
            border-radius: 10px;
         }
         .sumary-produk{
            background-color: darkcyan;
            border-radius: 10px;
         }
         .no-decoration{
            text-decoration: none;
         }
         .no-decoration:hover{
            text-decoration:underline;
         }
    </style>

</head>
   
<body>
<!-- navbar -->
        
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
                <a class="navbar-brand" href="#" class="span2">Sepatu <strong class="span" >Kita.</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-2">
                <li class="nav-item me-3">
                <a class="nav-link active" aria-current="page" href="../adminpanel">Home</a>
                </li>
                <!-- <li class="nav-item me-3">
                <a class="nav-link" href="kategori.php">kategori</a>
                </li> -->
                <li class="nav-item me-3">
                <a class="nav-link" href="produk.php">Produk</a>
                </li>
                <li class="nav-item me-3">
                <a class="nav-link" href="viewTransaksi.php">Transaksi</a>
                </li>
                <li class="nav-item me-3">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-house fa-beat-fade"></i> Home
                </li>
            </ol>
        </nav>
        <h2>Halo Admin</h2>
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-3  col-md-6 col-12 mb-3" >
                    <div class="sumary-kategori ">
                        <div class="row">
                            <div class="col-4">
                            <i class="fas fa-align-justify fa-7x text-black-50"></i>
                            </div>
                            <div class="col-4 text-white" >
                                <h3>Kategori</h3>
                                <p class="fs-6"><?php echo $jumplahkategori?> kategori</p>
                                <p><a href="kategori.php" class="text-white no-decoration" >Lihat detail</a></p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-3 col-md-6 col-12" >
                    <div class="  sumary-produk ">
                        <div class="row">
                            <div class="col-5">
                            <i class="fa-brands fa-product-hunt fa-7x text-black-50"></i>
                            </div>
                            <div class="col-5 text-white" >
                                <h3>Product</h3>
                                <p class="fs-6"><?php echo $jumplahproduct?> Product</p>
                                <p><a href="produk.php" class="text-white no-decoration" >Lihat detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
<!-- end corousel -->
    <!-- js -->
    <script src="../bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
</body>
</html>