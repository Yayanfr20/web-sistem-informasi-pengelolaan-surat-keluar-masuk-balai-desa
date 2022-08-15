<?php
require 'config.php';

// function registrasi
function registrasi($data)
{
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM admin WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "
        <div class='alert alert-danger' role='alert'>
                   email sudah digunakan!
        </div>
        ";
        return false;
    }


    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <div class='alert alert-danger' role='alert'>
                  Konfirmasi password tidak sesuai!
        </div>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO admin VALUES('', '$email', '$password')");

    return mysqli_affected_rows($conn);
}


// function buatSurat
function buatSurat($data)
{
    // mengambil koneksi database
    global $conn;

    // proses pengambilan dari form
    $nama          = htmlspecialchars($data['nama']);
    $ttl           = htmlspecialchars($data['ttl']);
    $umur          = htmlspecialchars($data['umur']);
    $warga_negara  = htmlspecialchars($data['warga_negara']);
    $agama         = htmlspecialchars($data['agama']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $pekerjaan     = htmlspecialchars($data['pekerjaan']);
    $alamat        = htmlspecialchars($data['alamat']);
    $desa          = htmlspecialchars($data['desa']);
    $judul_surat   = htmlspecialchars($data['judul_surat']);
    $nomor_surat   = htmlspecialchars($data['nomor_surat']);
    $ktp           = htmlspecialchars($data['ktp']);
    $kk            = htmlspecialchars($data['kk']);
    $keterangan    = htmlspecialchars($data['keterangan']);


    // proses memasukan kedatabase

    $query = "INSERT INTO tb_surat_masuk VALUES('', '$nama', '$ttl', '$umur', '$warga_negara', '$agama', '$jenis_kelamin', '$pekerjaan', '$alamat', '$desa', '$judul_surat', '$nomor_surat', '$ktp', '$kk', '$keterangan')";

    mysqli_query($conn, $query);

    // mengembalikan pesan apa berhasil atau gagal
    return mysqli_affected_rows($conn);
}


// function menampilkan data dari database

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_surat_masuk WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function editSurat($data)
{
    // mengambil koneksi database
    global $conn;

    // proses pengambilan dari form
    $nama          = htmlspecialchars($data['nama']);
    $ttl           = htmlspecialchars($data['ttl']);
    $umur          = htmlspecialchars($data['umur']);
    $warga_negara  = htmlspecialchars($data['warga_negara']);
    $agama         = htmlspecialchars($data['agama']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $pekerjaan     = htmlspecialchars($data['pekerjaan']);
    $alamat        = htmlspecialchars($data['alamat']);
    $desa          = htmlspecialchars($data['desa']);
    $judul_surat   = htmlspecialchars($data['judul_surat']);
    $nomor_surat   = htmlspecialchars($data['nomor_surat']);
    $ktp           = htmlspecialchars($data['ktp']);
    $kk            = htmlspecialchars($data['kk']);
    $keterangan    = htmlspecialchars($data['keterangan']);

    // proses perubahaan data
    $query = "UPDATE tb_surat_masuk SET nama = '$nama', tanggal = '$ttl', umur = '$umur', warga_negara = '$warga_negara', agama = '$jenis_kelamin', pekerjaan = '$pekerjaan', alamat = '$alamat', desa = '$desa', judul_surat = '$judul_surat', nomor_surat = '$nomor_surat', ktp = '$ktp', kk = '$kk', keterangan = '$keterangan'";

    mysqli_query($conn, $query);

    // mengembalikan pesan apa berhasil atau gagal
    return mysqli_affected_rows($conn);
}
