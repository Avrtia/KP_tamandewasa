<?php
include 'includes/connect.php'; // koneksi database

session_start();
$message = "";

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Cek user berdasarkan username
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Jika password belum di-hash, gunakan perbandingan biasa
        if ($password == $row["password"] || password_verify($password, $row["password"])) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];

            // Arahkan sesuai role
            if ($row["role"] == "guru") {
                header("Location: dashboard-guru.php");
                exit;
            } elseif ($row["role"] == "siswa" || $row["role"] == "murid") {
                header("Location: dashboard-murid.php");
                exit;
            } else {
                $message = "Peran pengguna tidak dikenali!";
            }
        } else {
            $message = "Password salah!";
        }
    } else {
        $message = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Class | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ===== Navbar ===== -->
  <nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
      <a class="navbar-brand text-primary" href="#">E-Class</a>
    </div>
  </nav>

  <!-- ===== Login Card ===== -->
  <main class="d-flex justify-content-center align-items-center vh-100">
    <div class="card index-card shadow-sm p-4 fade-in" style="max-width:420px; width:100%">
      <div class="card-body">
        <h3 class="index-title mb-3 text-center">Login E-Class</h3>
        <p class="text-muted text-center mb-4">Masukkan username dan password Anda</p>

        <?php if (!empty($message)): ?>
          <div class="alert alert-danger py-2 text-center"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-2">Masuk</button>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
