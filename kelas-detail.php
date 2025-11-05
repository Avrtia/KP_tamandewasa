<?php
// index.php
// Halaman login sederhana (frontend only) untuk memilih peran.
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>E-Class - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">

  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm p-3" style="max-width:420px; width:100%">
      <div class="card-body">
        <h3 class="card-title mb-3 text-center fw-bold text-primary">E-Class</h3>
        <p class="text-center text-muted mb-4">Prototype UI — hanya frontend (tanpa database)</p>
        
        <div class="d-grid gap-2 mb-3">
          <a href="dashboard-murid.php" class="btn btn-primary btn-lg">Masuk sebagai Murid</a>
          <a href="dashboard-guru.php" class="btn btn-success btn-lg">Masuk sebagai Guru</a>
        </div>

        <hr>
        <p class="text-center small text-muted mb-0">
          Pilih peran untuk melihat tampilan dashboard.  
          Semua data masih dummy (belum terhubung ke backend).
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
