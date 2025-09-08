<?php
include "koneksi.php";

// Ambil data absensi
$result = $koneksi->query("SELECT * FROM absensi ORDER BY waktu DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Absensi Pegawai ASN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f4f6f9; }
    .card { border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    header { background: #004aad; color: white; padding: 20px; text-align: center; margin-bottom: 20px; border-radius: 0 0 20px 20px; }
    footer { background: #004aad; color: white; padding: 10px; text-align: center; margin-top: 20px; }
  </style>
</head>
<body>
  <header>
    <h1>📋 Sistem Absensi Pegawai ASN</h1>
  </header>

  <div class="container">
    <!-- Form Absensi -->
    <div class="card p-4 mb-4">
      <h4 class="mb-3">Form Kehadiran</h4>
      <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">✅ Data berhasil disimpan!</div>
      <?php elseif (isset($_GET['deleted'])): ?>
        <div class="alert alert-danger">🗑️ Data berhasil dihapus!</div>
      <?php endif; ?>
      <form action="proses.php" method="POST" class="row g-3">
        <div class="col-md-6">
          <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai" required>
        </div>
        <div class="col-md-4">
          <select name="status" class="form-select" required>
            <option value="">Pilih Status</option>
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alpha">Alpha</option>
          </select>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </div>
      </form>
    </div>

    <!-- Tabel Absensi -->
    <div class="card p-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Kehadiran Pegawai</h4>
        <a href="export_excel.php" class="btn btn-success">⬇️ Download Excel</a>
      </div>
      <table class="table table-bordered table-striped table-hover">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['nama']) ?></td>
              <td><?= $row['status'] ?></td>
              <td><?= $row['waktu'] ?></td>
              <td>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Sistem Absensi Pegawai ASN</p>
  </footer>
</body>
</html>
