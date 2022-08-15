<?php
// =========== koneksi database ======== //
// // host database
$db_host = "localhost";
// username database //
$db_username = "root";
// password database //
$db_password = "";
// name database //
$db_name = "sisfosurat";

// // host database
// $db_host = "sql101.epizy.com";
// // username database //
// $db_username = "epiz_32391475";
// // password database //
// $db_password = "Bb5WN1SH6Q";
// // name database //
// $db_name = "epiz_32391475_sisfosurat";


// koneksi ke database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
