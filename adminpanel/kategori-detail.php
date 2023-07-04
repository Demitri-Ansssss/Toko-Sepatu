<?php
      require "session.php";
      require "../koneksi.php";

    $id = $_GET['p'];
    $query = mysqli_query($conn,"SELECT * FROM kategori WHERE id='$id'");
    $data = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail-Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2/css/style.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container">
                    <a class="navbar-brand" href="#" class="span">Sepatu <strong class="span" >Kita.</strong></a>
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
                    <a class="nav-link" href="#">Produk</a>
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
        <h2>Detail kategori</h2>
        
        <div class="col-12 col-md-6">
            <!-- <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="<?php echo $data['nama']?>" >
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" name="Editbtn" >Edit</button>
                    <button type="submit" class="btn btn-danger" name="Deletebtn" >Delete</button>
                </div>
                
            </form> -->

            <?php
                if (isset($_POST['Editbtn'])) {
                    $kategori = htmlspecialchars($_POST['kategori']);
                    if ($data['nama']==$kategori) {
                        ?>
                        <meta http-equiv="refresh" content="0; url=kategori.php" />
                        <?php
                    }else{
                        $query= mysqli_query($conn,"SELECT * FROM kategori WHERE nama='$kategori'");
                        $jumplahdata = mysqli_num_rows($query);

                        if ($jumplahdata>0) {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                             Data yang anda masukan sudah ada.
                            </div>
                            <?php
                        }else{
                            $Editbtn = mysqli_query($conn,"UPDATE kategori SET nama='$kategori' WHERE id='$id'");
    
                            if ($Editbtn) {
                                ?>
                                <div class="alert alert-success mt-3" role="alert">
                                    Kategori berhasil Di-Update
                                </div>
    
                                <meta http-equiv="refresh" content="2; url=kategori.php" />
                               <?php
                            }else{
                                echo mysqli_error($conn);
    
                            }
                        }
                    }
                }
            ?>
            <?php
                if (isset($_POST['Deletebtn'])) {
                   $Deletebtn = mysqli_query($conn, "DELETE FROM kategori WHERE id = '$id'");

                   if ($Deletebtn) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Kategori berhasil Di-Delete.
                    </div>

                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                   <?php
                   }else{
                    echo mysqli_error($conn);
                    }
                }
            ?>

        </div>
    </div>


    <!-- js -->
    <script src="../bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
</body>
</html>