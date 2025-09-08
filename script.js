const form = document.getElementById("absenForm");
const tableBody = document.querySelector("#absenTable tbody");
const downloadBtn = document.getElementById("downloadExcel");

let dataAbsensi = [];

form.addEventListener("submit", function(e) {
  e.preventDefault();
  const nama = document.getElementById("nama").value;
  const status = document.getElementById("status").value;
  const waktu = new Date().toLocaleString();

  const entry = { nama, status, waktu };
  dataAbsensi.push(entry);

  renderTable();
  form.reset();
});

function renderTable() {
  tableBody.innerHTML = "";
  dataAbsensi.forEach((row, index) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${index + 1}</td>
      <td>${row.nama}</td>
      <td>${row.status}</td>
      <td>${row.waktu}</td>
    `;
    tableBody.appendChild(tr);
  });
}

downloadBtn.addEventListener("click", function() {
  if (dataAbsensi.length === 0) {
    alert("Belum ada data absensi untuk diunduh!");
    return;
  }

  // Ambil tabel langsung dari DOM
  const table = document.getElementById("absenTable");

  // Konversi tabel HTML ke worksheet Excel
  const worksheet = XLSX.utils.table_to_sheet(table);

  // Buat workbook baru
  const workbook = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(workbook, worksheet, "Absensi Pegawai");

  // Simpan ke file Excel
  XLSX.writeFile(workbook, "Laporan_Absensi_ASN.xlsx");
});


function renderTable() {
  tableBody.innerHTML = "";
  dataAbsensi.forEach((row, index) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${index + 1}</td>
      <td>${row.nama}</td>
      <td>${row.status}</td>
      <td>${row.waktu}</td>
      <td><button class="btn-hapus" onclick="hapusData(${index})">Hapus</button></td>
    `;
    tableBody.appendChild(tr);
  });
}

function hapusData(index) {
  if (confirm("Yakin ingin menghapus data ini?")) {
    dataAbsensi.splice(index, 1);
    renderTable();
  }
}
