<?php
include 'includes/connect.php';
include 'includes/header.php';

if (!isset($_GET['id'])) {
  echo "<div class='container mt-5'><div class='alert alert-danger'>ID siswa tidak ditemukan.</div></div>";
  exit;
}

$id = intval($_GET['id']);

$query = "
  SELECT s.*, k.nama_kelas
  FROM siswa s
  LEFT JOIN kelas k ON s.id_kelas = k.id_kelas
  WHERE s.id_siswa = $id
";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
  echo "<div class='container mt-5'><div class='alert alert-danger'>Data siswa tidak ditemukan.</div></div>";
  exit;
}

// Rekap presensi
$rekap = mysqli_query($conn, "
  SELECT keterangan, COUNT(*) AS jumlah
  FROM presensi
  WHERE id_siswa = $id
  GROUP BY keterangan
");

$presensi = [
  'Hadir' => 0,
  'Absen' => 0,
  'Ijin' => 0,
  'Sakit' => 0
];

while ($r = mysqli_fetch_assoc($rekap)) {
  $presensi[$r['keterangan']] = $r['jumlah'];
}
?>

<main class="container bk-container">
  <h2 class="mb-3">Detail Siswa</h2>

  <table class="table table-striped">
    <tr><th>Nama Lengkap</th><td><?= htmlspecialchars($data['nama_siswa']) ?></td></tr>
    <tr><th>Kelas</th><td><?= htmlspecialchars($data['nama_kelas']) ?></td></tr>
    <tr><th>Jenis Kelamin</th><td><?= htmlspecialchars($data['jenis_kelamin']) ?></td></tr>
    <tr><th>No. Telepon</th><td><?= htmlspecialchars($data['no_telp'] ?? '-') ?></td></tr>
    <tr><th>Nama Orang Tua</th><td><?= htmlspecialchars($data['nama_orangtua'] ?? '-') ?></td></tr>
    <tr><th>No. Telepon Wali</th><td><?= htmlspecialchars($data['no_telp_wali'] ?? '-') ?></td></tr>
    <tr><th>Sosial Media</th><td><?= htmlspecialchars($data['sosmed'] ?? '-') ?></td></tr>
  </table>

  <h4 class="mt-4">Rekap Presensi Semester Ini</h4>
  <table class="table table-bordered presensi-table">
    <thead>
      <tr>
        <th>Keterangan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>Hadir</td><td><?= $presensi['Hadir'] ?></td></tr>
      <tr><td>Absen</td><td><?= $presensi['Absen'] ?></td></tr>
      <tr><td>Ijin</td><td><?= $presensi['Ijin'] ?></td></tr>
      <tr><td>Sakit</td><td><?= $presensi['Sakit'] ?></td></tr>
    </tbody>
  </table>

  <a href="bk.php" class="btn btn-back mt-2">← Kembali</a>
</main>
