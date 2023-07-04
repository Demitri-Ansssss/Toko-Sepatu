<?php
    require 'session.php';
    require '../koneksi.php';
     
    $query = mysqli_query($conn,"SELECT * from cart inner join produk on produk.id_product = cart.id_product inner join users on users.id = cart.id_user where id_user = " . $_SESSION['id']);
    // while($data = $query->fetch_assoc()){
    //        var_dump($data);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384 #   rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2/css/style.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/all.min.css">

</head>
<body>
    <div class="container">
        <div class="mt-3">
            <h3>List Cart Anda</h3>

            <div class="table-responsive mt-5">
                <table class="table table-secondary and table-striped table-hover" style="--bs-border-opacity: .5;">
                    <thead>
                        <tr class="table-dark text-center">
                            <th>
                                No.
                            </th>
                            <th>
                                nama product
                            </th>
                            <th>
                                Gambar
                            </th>
                            <th>
                                Ukuran
                            </th>
                            <th>
                                Harga
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                            $jumplah = 1;
                            $price = 0;
                            while($data = $query->fetch_assoc()){
                                $price += $data['harga'];
                                ?>
                                    <tr class="text-center" >
                                        <td><?php echo $jumplah++?></td>
                                        <td><?php echo $data['nama']?></td>
                                       
                                        <td><img src="../Asset/productImg<?=$data['foto']?>" width="150px" alt=""></td>
                                        <td><?php echo $data['ukuran']?></td>
                                        <td><?php echo $data['harga']?></td>
                                        <td>
                                            <a href="deletecart.php?id_product=<?= $data['id_product']?>" class="btn btn-primary">delete</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                            
                        
                        ?>
                    </tbody>
                </table>
                <h3>
                <?php
                    
                    echo "Total Harga= " . $price
                ?>
                </h3>
                <a href="checkout.php?id=<?=$_SESSION['id']?>&total=<?=$price?>">
                    <button class="btn btn-primary "><i class="fas fa-money-bill-1-wave"></i> Checkout</button>
                </a>
            </div>
        </div>





    <script src="../bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
    <script src="../fontawesome-free-6.4.0-web/js/all.min.js"></script>
</body>
</html>