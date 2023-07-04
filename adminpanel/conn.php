<?php 
    require "session.php";
    require "../koneksi.php";


     $result = $conn->query('SELECT * FROM produk');;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <link rel="stylesheet" href="conn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?Family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>

  </head>
<body>
    <!-- navbar start -->
    <header>
    <div class="navbar">
        <a href="#" class="navbar-logo">sepatu<span>kita.</span></a>
        <div class="navbar-nav">
            <a href="#">Home</a>
            <a href="#ourproduct" class="dropdown">Product</a>
            <a href="#contact">Contact</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search">
               
                <i data-feather='search'></i>
            </a>
            <a href="#" id="shopping-cart"><i data-feather='shopping-cart'></i></a>
            <a href="#" id="menu"><i data-feather='menu'></i></a>
        </div>
    </div>
</header>

    <!-- navbar end -->
    <!-- secsions start -->

    <section class="hero" id="home">
        <main class="content">
            <h2>Discovery Your <span>Lifestyle.</span></h2>
            <p>
                Selamat datang di toko Sepatu Kami, Kami merupakan
                toko sepatu terpercaya  di nganjuk dan menawarkan berbagai
                merk sepatu dengan harga yang ramah dikantong Mahasiswa.
            </p>
            <a href="#" class="cta">Beli Sekarang</a>
        </main>
    </section>
    <!-- secsions end -->

    <!-- about scsions start -->
    <section id="ourproduct" class="ourproduct">
        <h2>Product <span>Kami.</span></h2>
        <div class="row">
            <div class="container">
                    <div class="container">
                <div class="row">
                <?php while($data = $result->fetch_assoc()):?>
                <div class="card">
                <img src="../Asset/productImg<?=$data['foto']?>" class="cardImg" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?=$data['nama']?></h5>
                <p class="card-text"><?=$data['detail']?></p>
                <h6 class="card-harga"><?=$data['harga']?></h6>
                <a href="#" class="btn btn-primary">
                <i data-feather="shopping-cart"></i>
                </a>
              </div>
            </div>
            <?php endwhile;?>
            </div>
            </div>
            </div>

        </div>
    </section>

    <!-- about scsions end -->
    

<!-- Feather Icons -->
    <script>
        feather.replace()
      </script>
</body>
</html>