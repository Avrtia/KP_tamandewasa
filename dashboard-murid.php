<?php
$title = 'Dashboard Murid';
?>
<!doctype html>
<html lang="id">
<head>
  <link rel="stylesheet" href="assets/css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
<?php include 'includes/header.php'; ?>

<main class="container my-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Kelas</h4>
    <small class="text-muted">Peran: Murid</small>
  </div>

  <div class="row" id="kelasContainer">
    <!-- cards injected by JS -->
  </div>
</main>

<script>
const dummyClasses = [
  {id:1, subject: "Matematika", time: "08:00 - 10:00", teacher: "Bu Rina"},
  {id:2, subject: "Fisika", time: "10:30 - 12:00", teacher: "Pak Dedi"},
  {id:3, subject: "Bahasa Inggris", time: "13:00 - 14:30", teacher: "Bu Laila"}
];

function renderKelas() {
  const container = document.getElementById('kelasContainer');
  container.innerHTML = '';
  dummyClasses.forEach(k => {
    const col = document.createElement('div');
    col.className = 'col-12 col-md-6 col-lg-4 mb-3';
    col.innerHTML = `
      <div class="card h-100 kelas-card shadow-sm">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">${k.subject}</h5>
          <p class="mb-1"><strong>Waktu:</strong> ${k.time}</p>
          <p class="mb-3"><strong>Pengajar:</strong> ${k.teacher}</p>
          <div class="mt-auto">
            <a href="kelas-detail.php?class=${k.id}" class="btn btn-primary w-100">Masuk Kelas</a>
          </div>
        </div>
      </div>
    `;
    container.appendChild(col);
  });
}

document.addEventListener('DOMContentLoaded', renderKelas);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
