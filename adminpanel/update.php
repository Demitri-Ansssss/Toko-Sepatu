<?php
     require "session.php";
     require "../koneksi.php";
     $queryKategori = mysqli_query($conn,"SELECT * FROM kategori");
     $produk = mysqli_query($conn,"SELECT * FROM produk WHERE id_product = " . $_GET['id']);
     
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2/css/style.css">


    <style>
         .no-decoration{
            text-decoration:none;
         }
         .no-decoration:hover{
            text-decoration: underline;
            color: tomato;
         }
         
    </style>
 </head>
 <body>
    <!-- navbar
 -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
                <a class="navbar-brand" href="#" >Sepatu <strong class="span" >Kita.</strong></a>
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
                <a class="nav-link" href="/adminpanel/logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel/" class="no-decoration text-muted" ><i class="fas fa-house fa-beat-fade"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class=""></i> Product
                </li>
            </ol>
        </nav>
<!-- file Input -->
        <div>
        <h5>Update Produk</h5>
        <form action="updateAction.php?id=<?=$_GET['id']?>" method="post">
            <?php
            while ($p = mysqli_fetch_array($produk)):
            ?>
            
                <div class="row">
                        <div class="col">
                            <label for="nama"> Nama Produk</label>
                            <input type="text" id="nama" placeholder="nama produk" class="form-control" name="nama" value="<?= $p['nama']?>" autocomplete="off" required>
                        </div>
                        <div class="col">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" value="<?= $p['kategori_id']?>" required >
                                <option value="">Pilih Satu</option>
                                <?php while ($data = mysqli_fetch_array($queryKategori)) :?>
                                        <option value="<?php echo $data['id']?>" <?php if($data['id'] == $p['kategori_id']){?> selected <?php }?>><?php echo $data['nama_kategori']?></option>
                                    <?php endwhile;?>
                            </select>
                        </div>
                        
                        <div class="col" >
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="<?=$p['harga']?>" required>
                        </div>
                        
                        <div class="col" >
                            <label for="ukuran">Ukuran</label>
                            <input type="range" id="ukuran" name="ukuran" min="39" max="43" class="form-control" value="<?=$p['ukuran']?>">
                            <span id="ukur"></span>
                        </div>
                        
                        <div class="col" >
                            <label for="stok">Stok</label>
                            <select name="stok" id="stok" class="form-control">
                                <option value="tersedia" <?php if($p['stok'] == 'tersedia'){?> selected <?php }?>>Tersedia</option>
                                <option value="habis" <?php if($p['stok'] == 'habis'){?> selected <?php }?>>Habis</option>
                            </select>
                        </div>
                        
                        <div class="col" >
                            <label for="detail">Detail</label>
                            <textarea name="detail" id="detail" cols="30" rows="10" class="form-control" value=""><?=$p['detail']?></textarea>
                        </div>
                        </div>
                            <div class="mt-3">
                            <button type="submit" class="btn btn-primary" name="Simpan" autocomplete="off">Submit</button>
                            <!-- <meta http-equiv="refresh" content="2; url=produk.php" /> -->
                        </div>
                    </div>
                    
            <?php endwhile;?>
                    
                </div>
            </form>
            <!-- Foto input -->
    </body>
    <script>
    document.getElementById('ukuran').addEventListener('change', function(){
        document.getElementById('ukur').innerHTML = this.value
    })
    </script>
    <script src="../bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
    </body>
</html>