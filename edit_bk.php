<?php
include 'includes/connect.php';
include 'includes/header.php';

if (!isset($_GET['id'])) {
  echo "<div class='container mt-5'><div class='alert alert-danger'>ID siswa tidak ditemukan.</div></div>";
  exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM siswa WHERE id_siswa = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<main class="container bk-container mt-4">
  <h2 class="text-success mb-3">Edit Data Siswa</h2>

  <form method="POST" action="edit_bk_action.php">
    <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">

    <div class="mb-3">
      <label class="form-label">Nama Siswa</label>
      <input type="text" name="nama_siswa" class="form-control" value="<?= htmlspecialchars($data['nama_siswa']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">No. Telepon</label>
      <input type="text" name="no_telp" class="form-control" value="<?= htmlspecialchars($data['no_telp'] ?? '') ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Nama Orangtua</label>
      <input type="text" name="nama_orangtua" class="form-control" value="<?= htmlspecialchars($data['nama_orangtua'] ?? '') ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">No. Telepon Wali</label>
      <input type="text" name="no_telp_wali" class="form-control" value="<?= htmlspecialchars($data['no_telp_wali'] ?? '') ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Sosial Media</label>
      <input type="text" name="sosmed" class="form-control" value="<?= htmlspecialchars($data['sosmed'] ?? '') ?>">
    </div>

    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="bk.php" class="btn btn-secondary">Kembali</a>
  </form>
</main>

<?php include 'includes/footer.php'; ?>
