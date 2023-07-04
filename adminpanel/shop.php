<?php 
    require "session.php";
    
    require "../koneksi.php";


     $result = $conn->query('SELECT * FROM produk');;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <link rel="stylesheet" href="conn.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
  <link href="https://fonts.googleapis.com/css2?Family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="../bootstrap-5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/all.css">
  <link rel="stylesheet" href="styleShop.css">
</head>
<body>
  <!-- navbar -->
  <div class="container" id="navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary-500">
      <div class="container">
        <a class="navbar-brand" href="#"> <strong class="logo">Sepatu <span class="span">Kita.</span></strong> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" style="align-items:flex-end; justify-content:center;" id="navbarNavAltMarkup">
          <div class="navbar-nav text-end">
            <a class="nav-link active text-white text-end" aria-current="page" href="#">Home</a>
            <a class="nav-link text-white text-end" href="#ourproduct">Product</a>
            <a class="nav-link text-white text-end" href="logout.php">Logout</a>
          </div>
        </div>
          <!-- <a class="text-white" href="#"><i data-feather="shopping-cart"></i></a> -->
          <a href="addcart.php"><i class="fas fa-cart-shopping"></i></a>
      </div>
    </nav>
  </div>
  <!-- navbar end -->
  <!-- corousel -->
  <div class="container mt-2" id="home">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../img/assets/img1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block fw-bold fst-italic">
        </div>
    </div>
        <div class="carousel-item">
          <img src="../img/assets/img2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../img/assets/img5.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../img/assets/img6.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- corousel end -->
  <!-- hero  -->
  <div class="container mt-2">
    <section class="hero" id="home" style=" background-image: url('../img/hero-content.jpg');">
          <main class="content">
              <h2>Discovery Your <span>Lifestyle.</span></h2>
              <p class="">
                  Selamat datang di toko Sepatu Kami, Kami merupakan <br>
                  toko sepatu terpercaya  di nganjuk dan menawarkan <br> berbagai
                  merk sepatu dengan harga yang ramah <br> dikantong Mahasiswa.
              </p>
              <a href="#ourproduct" class="cta">Beli Sekarang</a>
          </main>
      </section>
  </div>
  <!-- end hero -->

<!-- product -->
  <div class="container mt-1">
    <div id="ourproduct" class="ourproduct">
      <a href="#navbar">
        <h5>Our <span>Product</span></h5>
      </a>
      <div class="row ">
        <?php while($data = $result->fetch_assoc()):?>
        <div class="card" style="width: 18rem; border-radius: 18px; border: 2px solid black;">
        <img src="../Asset/productImg<?=$data['foto']?>" class="card-img-top" alt="...">
        <div class="card-body text-center">
                  <h4 class="card-title"><?=$data['nama']?></h4>
                  <p class="card-text"><?=$data['detail']?></p>
                  <h6 class="card-harga mt-2"><?=$data['harga']?></h6>
                  <a href="addcart.php?id=<?= $data['id_product']?>" class="btn btn-primary mt-2 cart">
                    <i data-feather="shopping-cart"  class="fas fa-cart-shopping"></class=>></i>
                  </a>
                </div>
              </div>
        <?php endwhile;?>
      </div>
    </div>
  </div>
        




<!-- feather Icon -->
<script src="../bootstrap-5.0.2/js/bootstrap.min.js"></script>
<script src="../fontawesome-free-6.4.0-web/js/all.js"></script>

<script>
   feather.replace()

  
  // console.log(cart)
</script>
</body>
</html>