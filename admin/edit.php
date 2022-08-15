<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require '../sistem/functions.php';
$err = "";
// ketika tombol submit dipencet
if (isset($_POST["edit"])) {
    if (editSurat($_POST) > 0) {
        $err = true;
    }
}

$id = $_GET['id'];
// mengambil surat per id
$surat  = query("SELECT * FROM tb_surat_masuk WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Surat masuk - Balai Desa Kelet</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
        <div>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Balai Desa Kelet</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Change password</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main navigation</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="surat masuk.php">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg></div>
                            Input Data Surat
                        </a>
                        <a class="nav-link" href="surat siap cetak.php">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg></div>
                            Surat Siap Cetak
                        </a>
                        <a class="nav-link" href="user.php">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                </svg></div>
                            Users
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="container">
                <main class="p-3 shadow mt-2" style="border-top: 2px solid blue;">
                    <h4 class="text-secondary">edit surat masuk</h4>
                    <?php if ($err) : ?>
                        <div class="alert alert-success" role="alert">
                            Surat berhasil diedit
                        </div>
                    <?php endif; ?>
                    <!-- form buat surat -->
                    <form action="" class="mt-3" method="post">
                        <!-- input nama -->
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $surat['nama']; ?>">
                        </div>
                        <!-- input ttl -->
                        <div class="mb-3">
                            <label class="form-label">TTL</label>
                            <input type="text" name="ttl" class="form-control" value="<?= $surat['tanggal']; ?>">
                        </div>
                        <!-- input umur -->
                        <div class="mb-3">
                            <label class="form-label">Umur</label>
                            <input type="text" name="umur" class="form-control" value="<?= $surat['umur']; ?>">
                        </div>
                        <!-- input warga_negara -->
                        <div class="mb-3">
                            <label class="form-label">Warga Negara</label>
                            <input type="text" name="warga_negara" class="form-control" value="<?= $surat['warga_negara']; ?>">
                        </div>
                        <!-- input agama -->
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" name="agama" class="form-control" value="<?= $surat['agama']; ?>">
                        </div>
                        <!-- input jenis_kelamin -->
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control" value="<?= $surat['jenis_kelamin']; ?>">
                        </div>
                        <!-- input pekerjaan -->
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="<?= $surat['pekerjaan']; ?>">
                        </div>
                        <!-- input alamat -->
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $surat['alamat']; ?>">
                        </div>
                        <!-- input desa -->
                        <div class="mb-3">
                            <label class="form-label">Desa</label>
                            <input type="text" name="desa" class="form-control" value="<?= $surat['desa']; ?>">
                        </div>
                        <!-- input judul_surat -->
                        <div class="mb-3">
                            <label class="form-label">Judul Surat</label>
                            <input type="text" name="judul_surat" class="form-control" value="<?= $surat['judul_surat']; ?>">
                        </div>
                        <!-- input nomor_surat -->
                        <div class="mb-3">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="<?= $surat['nomor_surat']; ?>">
                        </div>
                        <!-- input ktp -->
                        <div class="mb-3">
                            <label class="form-label">KTP</label>
                            <input type="text" name="ktp" class="form-control" value="<?= $surat['ktp']; ?>">
                        </div>
                        <!-- input kk -->
                        <div class="mb-3">
                            <label class="form-label">KK</label>
                            <input type="text" name="kk" class="form-control" value="<?= $surat['kk']; ?>">
                        </div>
                        <!-- input keterangan -->
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="<?= $surat['keterangan']; ?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="edit" class="btn btn-primary  opacity-70">Submit</button>
                        </div>
                    </form>
                </main>
            </div>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>