<?php
include "koneksi.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Absensi_ASN.xls");

echo "<table border='1'>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Status</th>
    <th>Waktu</th>
</tr>";

$result = $koneksi->query("SELECT * FROM absensi ORDER BY waktu DESC");
$no = 1;
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$no++."</td>
        <td>".$row['nama']."</td>
        <td>".$row['status']."</td>
        <td>".$row['waktu']."</td>
    </tr>";
}
echo "</table>";
?>
