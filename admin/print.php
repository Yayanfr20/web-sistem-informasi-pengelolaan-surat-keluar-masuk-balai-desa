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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <style>
        .container {
            width: 90%;
            margin: 0 5%;
        }

        .garis {
            width: 100%;
            height: 2px;
            background-color: black;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <hr>
        <h1 style="text-align: center; font-size: 16px;">Jl.Raya Kelet No.40 Desa Kelet Kecamatan Donorojo, Kabupaten Jepara 594554</h1>
        <h1 style="text-align: center; font-size: 16px;">Kecamatan Donorojo Kabupaten Jepara Provinsi Jawa Tengah Kode Pos 594554</h1>
        <hr>
        <h1 style="text-align: center; font-size: 16px">SURAT PENGANTAR</h1>
        <hr>
        <p style="text-align: center;">Pemohon</p>
        <div style="display: flex; width: 100%;">
            <div style="width: 50%;">
                <ul style="list-style: none;">
                    <li>
                        Nomor
                    </li>
                    <li>
                        Nama
                    </li>
                    <li>
                        Tempat Tanggal Lahir
                    </li>
                    <li>
                        Umur
                    </li>
                    <li>
                        warga Negara
                    </li>
                    <li>
                        Agama
                    </li>
                    <li>
                        Jenis Kelamin
                    </li>
                    <li>
                        Pekerjaan
                    </li>
                    <li>
                        Alamat
                    </li>
                    <li>
                        KTP
                    </li>
                    <li>
                        KK
                    </li>
                    <li>
                        Keterangan
                    </li>
                </ul>
            </div>
            <div>
                <ul style="list-style: none;">
                    <li>
                        : <?= $surat['nomor_surat']; ?>
                    </li>
                    <li>
                        : <?= $surat['nama']; ?>
                    </li>
                    <li>
                        : <?= $surat['tanggal']; ?>
                    </li>
                    <li>
                        : <?= $surat['umur']; ?>
                    </li>
                    <li>
                        : <?= $surat['warga_negara']; ?>
                    </li>
                    <li>
                        : <?= $surat['agama']; ?>
                    </li>
                    <li>
                        : <?= $surat['jenis_kelamin']; ?>
                    </li>
                    <li>
                        : <?= $surat['pekerjaan']; ?>
                    </li>
                    <li>
                        : <?= $surat['alamat']; ?>
                    </li>
                    <li>
                        : <?= $surat['ktp']; ?>
                    </li>
                    <li>
                        : <?= $surat['kk']; ?>
                    </li>
                    <li>
                        : <?= $surat['keterangan']; ?>
                    </li>
                </ul>
            </div>
        </div>
        <p style="text-align: center;">Demikian surat Keterangan ini dibuat, untuk digunakan sebagai mestinya</p>
        <hr>
        <hr>
        <p style="text-align: end;">jepara 2022-03-08</p>

        <div style="display: flex; width: 100%; margin: 10px; justify-content: space-around;">
            <div style="width: 50%;">
                <h5>Mengetahui <br> Kepala Desa <br> Kelet</h5>
                <br><br>
                <h5>samsudin</h5>
            </div>
            <div style="width: 50%; text-align: end;">
                <h5>Pemohon</h5>
                <br><br><br><br>
                <h5><?= $surat['nama']; ?></h5>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>



</body>

</html>