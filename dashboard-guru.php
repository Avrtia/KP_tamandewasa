<?php
$title = 'Dashboard Guru';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= $title ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
<?php include 'includes/header.php'; ?>

<main class="container my-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Menu Guru</h4>
    <small class="text-muted">Peran: Guru</small>
  </div>

  <div class="row g-3">
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card menu-card shadow-sm text-center p-3">
        <h5>Upload Materi</h5>
        <p class="text-muted small">Unggah file pembelajaran</p>
        <button class="btn btn-outline-success w-100" onclick="openModal('materi')">Buka</button>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
      <div class="card menu-card shadow-sm text-center p-3">
        <h5>Beri Tugas</h5>
        <p class="text-muted small">Buat tugas baru untuk murid</p>
        <button class="btn btn-outline-success w-100" onclick="openModal('tugas')">Buka</button>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
      <div class="card menu-card shadow-sm text-center p-3">
        <h5>Presensi</h5>
        <p class="text-muted small">Atur daftar hadir</p>
        <button class="btn btn-outline-success w-100" onclick="location.href='kelas-detail.php?class=1&tab=presensi'">Buka</button>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
      <div class="card menu-card shadow-sm text-center p-3">
        <h5>Nilai</h5>
        <p class="text-muted small">Lihat & nilai submission</p>
        <button class="btn btn-outline-success w-100" onclick="location.href='kelas-detail.php?class=1&tab=nilai'">Buka</button>
      </div>
    </div>
  </div>

  <hr class="my-4">

  <h5 class="mb-3">Daftar Kelas yang Anda Kelola</h5>
  <div class="row" id="kelasGuru"></div>
</main>

<!-- Modal -->
<div class="modal fade" id="genericModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modalTitle" class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="modalBody"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
const classesManaged = [
  {id:1, subject:'Matematika', time:'08:00 - 10:00'},
  {id:2, subject:'Kimia', time:'10:30 - 12:00'}
];

function renderGuruKelas(){
  const container = document.getElementById('kelasGuru');
  container.innerHTML = '';
  classesManaged.forEach(k=>{
    const col = document.createElement('div');
    col.className = 'col-12 col-md-6 mb-3';
    col.innerHTML = `
      <div class="card shadow-sm">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h6 class="mb-1">${k.subject}</h6>
            <small class="text-muted">${k.time}</small>
          </div>
          <div>
            <a href="kelas-detail.php?class=${k.id}" class="btn btn-success btn-sm">Kelola Kelas</a>
          </div>
        </div>
      </div>
    `;
    container.appendChild(col);
  });
}

document.addEventListener('DOMContentLoaded', renderGuruKelas);

function openModal(type){
  const title = type === 'materi' ? 'Upload Materi (Dummy UI)' : 'Buat Tugas (Dummy UI)';
  document.getElementById('modalTitle').innerText = title;
  document.getElementById('modalBody').innerHTML = '<p class="small text-muted">Ini hanya UI dummy. File tidak akan diunggah.</p>';
  const modal = new bootstrap.Modal(document.getElementById('genericModal'));
  modal.show();
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
