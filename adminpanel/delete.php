     <?php
          require "session.php";
          require "../koneksi.php";
          $queryKategori = mysqli_query($conn,"DELETE FROM produk WHERE id_product=" . $_GET['id']);
          header("location:produk.php");
          
     ?>