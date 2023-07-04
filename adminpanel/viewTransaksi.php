<?php
    require "session.php";
    require "../koneksi.php";
    $query = mysqli_query($conn,"SELECT * FROM transaksi");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384 #   rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2/css/style.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/all.min.css">
</head>

<body>
    
<div class="container">
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
                <a class="nav-link" href="">Produk</a>
                </li>
                <li class="nav-item me-3">
                <a class="nav-link" href="">Transaksi</a>
                </li>
                <li class="nav-item me-3">
                <a class="nav-link" href="">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>


        <div class="mt-3">
            <h3 class="text-center" >Transaksi</h3>

            <div class="table-responsive mt-3">
                <table class="table table-secondary and table-striped table-hover" style="--bs-border-opacity: .5;">
                    <thead>
                        <tr class="table-dark text-center">
                            <th>
                                No.
                            </th>
                            <th>
                                id user
                            </th>
                            <th>
                                total
                            </th>
                            <th>
                                tanggal transaksi
                            </th>
                            
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                            $jumplah = 1;
                            
                            while($data = $query->fetch_assoc()){
                                
                                ?>
                                    <tr class="text-center">
                                        <td><?php echo $jumplah++?></td>
                                        <td><?php echo $data['id_user']?></td>
                                        <td><?php echo $data['total']?></td>
                                        <td><?php echo $data['tanggal_transaksi']?></td>
                                        
                                    </tr>

                                <?php

                            }
                            
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>


    <script src="../bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
</body>
</html>