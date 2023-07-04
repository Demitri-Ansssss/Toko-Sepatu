<?php
        require "session.php";
        require "../koneksi.php";

        $queryKategori = mysqli_query($conn,"SELECT * FROM kategori");
        $jumplahKategori= mysqli_num_rows($queryKategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
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
                <li class="nav-item me-3">
                <a class="nav-link" href="kategori.php">kategori</a>
                </li>
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
                    <i class=""></i> Kategori
                </li>
            </ol>
        </nav>

        <div class="my-3 col-12 col-md-4">
            <h5>Tambah Kategori</h5>

            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" placeholder="nama kategori" class="form-control" name="input_kategori" >
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary" name="Simpan">Submit</button>
                    </div>
                </div>
            </form>
            
            <?php
                    if (isset($_POST['Simpan'])) {
                        $Kategori = htmlspecialchars($_POST['input_kategori']);

                        $pengecekan = mysqli_query($conn,"SELECT nama FROM kategori WHERE nama ='$Kategori'");
                        $datainputkategori = mysqli_num_rows($pengecekan);
                        if ($datainputkategori > 0) {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                             Data yang anda masukan sudah ada.
                            </div>
                            <?php
                        }
                        else{
                            $btnsimpan = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES ('$Kategori')");
    
                            if ($btnsimpan) {
                                ?>
                                <div class="alert alert-success mt-3" role="alert">
                                    Kategori berhasil Di-Inputkan.
                                </div>
    
                                <meta http-equiv="refresh" content="2; url=kategori.php" />
                               <?php
                            }else{
                                echo mysqli_error($conn);
    
                            }
    
                        }
                    }
            ?>

        </div>

        <div class="mt-3">
            <h3>List Kategori</h3>

            <div class="table-responsive mt-5">
                <table class="table table-secondary and table-striped table-hover" style="--bs-border-opacity: .5;">
                    <thead c>
                        <tr class="table-dark">
                            <th>
                                No.
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">
                            <?php
                                if ($jumplahKategori==0) {
                                    ?>
                                     <tr>
                                        <td colspan="3" class="text-center">
                                            Data Tidak ditemukan.
                                        </td>
                                     </tr>
                                    <?php
                                }else {
                                    $jumplah= 1;
                                    while ($data = mysqli_fetch_array($queryKategori)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $jumplah?>
                                                </td>
                                                <td>
                                                    <?php
                                                         echo $data['nama_kategori']
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="kategori-detail.php?p=<?php echo $data['id']?>"
                                                    class="btn btn-info"> <i class="fa-solid fa-magnifying-glass"></i>
                                                    </a>
                                                    <a href="kategori-detail.php?p=<?php echo $data['id']?>"
                                                    class="btn btn-danger"> <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        $jumplah++;
                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    




<!-- js -->
    <script src="../bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
</body>
</html>