<?php
    session_start();
    require "../koneksi.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2/css/bootstrap.min.css">

</head>
        <style>
            .main{
                height: 100vh;
            }
            .login-box{
                width: 400px;
                height: 250px;
                border-radius: 15px;
                box-sizing: border-box;


            }
        </style>
<body>
    <div class="main d-flex flex-column align-items-center justify-content-center bg-light bg-gradient">
        <div class="login-box p-2 shadow bg-secondary bg-gradient">
                <form action="" method="post">
                    <div>
                        <label for="username" class="text-info">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div>
                        <label for="password"class="text-info">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div>
                        <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn" type="submit">Login</button>
                    </div>
                </form>
        </div>
            <div class="mt-4" style="width: 350px ">
                <?php
                if (isset($_POST['loginbtn'])) {
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($conn, "SELECT * FROM users WHERE users='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                    var_dump($data);
                    if($countdata>0){
                        if(password_verify($password, $data['password'])){
                            $_SESSION["id"] = $data['id'];
                            $_SESSION['login'] = true;
                            if($data['role'] == 0){header('location:shop.php');}
                            if($data['role'] == 1){header('location:index.php');}
                        }else{
                            ?>
                            <div class="alert alert-danger" role="alert">
                            Password salah.
                            </div>
                            <?php
                        }
                    }else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Akun tidak ditemukan!!!!!
                        </div>
                      <?php
                    }
                }
                ?>
            </div>

    </div>
</body>
</html>