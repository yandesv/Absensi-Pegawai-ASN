<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $status = $_POST['status'];

    $sql = "INSERT INTO absensi (nama, status) VALUES ('$nama', '$status')";
    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>
