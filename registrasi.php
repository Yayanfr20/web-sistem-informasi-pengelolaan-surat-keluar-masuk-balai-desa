<?php
// koneksi ke function
require 'sistem/functions.php';
$err = "";

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        $err = true;
    }
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
                <h1 class="fs-3 text-center">Registrasi Akun</h1>
                <p class="text-center">Balai Desa Kelet</p>
            </header>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="email" placeholder="Email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="Konfirmasi Password" name="password" class="form-control">
                </div>
                <div class="mb-5">
                    <input type="password" placeholder="Password" class="form-control" name="password2">
                </div>
                <div class="mb-3">
                    <a href="index.php">sudah punya akun?</a>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control opacity-50" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="asset/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>