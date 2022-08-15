<?php
session_start();
require 'sistem/functions.php';
$err = "";

// ketika tombol login dipencet
if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session login
            $_SESSION["login"] = true;
            // jika password benar diarahkan ke polder admin lalu masuk ke index
            header("Location: admin/index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balai Desa Kelet</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .login {
            width: 320px;
            height: auto;
            margin: auto;
            padding: 14px;
            margin-top: 100px;
        }
    </style>
</head>

<body>

    <!-- form login -->
    <div class="container">
        <div class="login shadow-lg">
            <?php if ($err) : ?>
                <div class="alert alert-primary" role="alert">
                    Akun berhasil dibuat silahkan login <a href="">disini</a>
                </div>
            <?php endif; ?>
            <header class="mb-5">
                <h1 class="fs-3 text-center">Login</h1>
                <p class="text-center">Balai Desa Kelet</p>
            </header>
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" placeholder="Email" name="email" class="form-control">
                </div>
                <div class="mb-5">
                    <label class="form-label">Password</label>
                    <input type="password" placeholder="Password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <a href="registrasi.php">belum punya akun ?</a>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary form-control opacity-70" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="asset/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>