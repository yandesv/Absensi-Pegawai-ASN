<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM absensi WHERE id=$id";
    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php?deleted=1");
        exit();
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>
