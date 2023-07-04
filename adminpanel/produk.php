<?php
     require "session.php";
     require "../koneksi.php";


     $result = $conn->query('SELECT * FROM produk');;

     $queryKategori = mysqli_query($conn,"SELECT * FROM kategori");
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
                <a class="nav-link" href="viewTransaksi.php">Transaksi</a>
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
        <h5>Tambah Produk</h5>
            <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label for="nama"> Nama Produk</label>
                            <input type="text" id="nama" placeholder="nama produk" class="form-control" name="nama" autocomplete="off" required>
                        </div>
                        <div class="col">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="">Pilih Satu</option>
                                <?php
                                    while ($data = mysqli_fetch_array($queryKategori)) {
                                        ?>
                                        <option value="<?php echo $data['id']?>"><?php echo $data['nama_kategori']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="col" >
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" required>
                        </div>

                        <div class="col" >
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>

                        
                        <div class="col" >
                            <label for="ukuran">Ukuran</label>
                            <input type="range" id="ukuran" name="ukuran" min="39" max="43" class="form-control">
                            <span id="ukur"></span>
                        </div>
                        
                        <div class="col" >
                            <label for="stok">Stok</label>
                            <select name="stok" id="stok" class="form-control">
                                <option value="tersedia">Tersedia</option>
                                <option value="habis">Habis</option>
                            </select>
                        </div>
                        
                        <div class="col" >
                            <label for="detail">Detail</label>
                            <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        </div>
                            <div class="mt-3">
                            <button type="submit" class="btn btn-primary" name="Simpan" autocomplete="off">Submit</button>
                        </div>
                        

                    </div>
                </div>
            </form>
            <!-- Foto input -->
            <?php
                function upload()
                {
                    
                }
    
                    if (isset($_POST['Simpan'])) {
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $nama = htmlspecialchars($_POST['nama']);
                        $harga = htmlspecialchars($_POST['harga']);
                        $foto =  '';
                        $detail = htmlspecialchars($_POST['detail']);
                        $ukuran = htmlspecialchars($_POST['ukuran']);
                        $stok = htmlspecialchars($_POST['stok']);
                        
                        $namaFiles = $_FILES['foto']['name'];
                        $size = $_FILES['foto']['size'];
                        $error = $_FILES['foto']['error'];
                        $temp = $_FILES['foto']['tmp_name'];

                        
                        if($error === 4)
                        {
                            echo "<script>
                            alert('pilih gambar terlebih dahulu')
                            </script>";
                            return false;
                        }
                        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
                        $ekstensiGambar = explode('.', $namaFiles);
                        $ekstensiGambar = strtolower(end($ekstensiGambar));
    
                        if(!in_array($ekstensiGambar, $ekstensiGambarValid))
                        {
                            echo"<script>
                            alert('yang anda upload bukan foto ')
                            </script>";
    
                            return false;
                        }
    
                        if($size > 1000000)
                        {
                            echo"<script>
                            alert('ukuran terlalu besar ')
                            </script>";
    
                            return false;
                        }
                        
                        move_uploaded_file($temp, '../Asset/productImg'. $namaFiles);
    
                        $foto = $namaFiles;

                        mysqli_query($conn,"INSERT INTO produk
                        VALUES ('', '".$kategori."', '".$nama."','".$harga."','".$foto."','".$detail."','".$ukuran."','".$stok."')");
                        ?> 
                        <meta http-equiv="refresh" content="2; url=produk.php" />
                        <?php
                    }
                    
            ?>
        <!-- tabel keluaran -->
        <div class="container">
        <div class="mt-3">
            <h3>List Kategori</h3>

            <div class="table-responsive mt-5">
                <table class="table table-secondary and table-striped table-hover" style="--bs-border-opacity: .5;">
                    <thead>
                        <tr class="table-dark text-center">
                            <th>
                                No.
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Kategori
                            </th>
                            <th>
                                Harga
                            </th>
                            <th>
                                Ukuran
                            </th>
                            <th>
                                Ketersediaan Stok
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         
                            $jumplah = 1;
                            while($data = $result->fetch_assoc()){
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $jumplah++?></td>
                                    <td><?php echo $data['nama']?></td>
                                    <td><?php echo $data['kategori_id']?></td>
                                    <td><?php echo $data['harga']?></td>    
                                    <td><?php echo $data['ukuran']?></td>
                                    <td><?php echo $data['stok']?></td>
                                    <td><a href="http://localhost/phpdasar/toko%20sepatu/adminpanel/update.php?id=<?= $data['id_product']?>" class="btn btn-primary">update</a>
                                    <a href="http://localhost/phpdasar/toko%20sepatu/adminpanel/delete.php?id=<?= $data['id_product']?>" class="btn btn-primary">delete</a>
                                </td>
                                </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    


<!-- js -->
<script>
    document.getElementById('ukuran').addEventListener('change', function(){
        document.getElementById('ukur').innerHTML = this.value
    })
</script>
<script src="../bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
</body>
</html>