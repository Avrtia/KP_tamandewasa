<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Class</title>

  <!-- ✅ Hubungkan ke CSS utama -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- (Opsional tapi disarankan) Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- ===== Navbar ===== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="index.php">E-Class</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3"><a class="nav-link" href="dashboard-murid.php">Murid</a></li>
        <li class="nav-item me-3"><a class="nav-link" href="dashboard-guru.php">Guru</a></li>
        <li class="nav-item">
          <a class="btn btn-outline-success px-3" href="index.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
