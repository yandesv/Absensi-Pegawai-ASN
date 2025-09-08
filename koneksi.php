<?php
$host = "localhost";
$user = "root";   // default XAMPP
$pass = "";       // default password kosong
$db   = "db_absensi_asn";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
