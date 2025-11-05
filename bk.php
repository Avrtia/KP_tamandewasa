<?php
include 'includes/connect.php';
include 'includes/header.php';
?>

<main class="container bk-container mt-4">
  <h2 class="mb-3 text-primary">Daftar Siswa (Bimbingan Konseling)</h2>

  <!-- 🔍 Form Pencarian -->
  <form method="GET" class="bk-search mb-3">
    <input type="text" name="search" placeholder="Cari nama siswa..."
           value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
  </form>

  <div class="table-responsive shadow-sm">
    <table class="table table-bordered table-hover bk-table align-middle">
      <thead class="table-primary">
        <tr>
          <th style="width:5%;">No</th>
          <th style="width:35%;">Nama Siswa</th>
          <th style="width:25%;">Kelas</th>
          <th style="width:35%;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $query = "
          SELECT s.id_siswa, s.nama_siswa, k.nama_kelas
          FROM siswa s
          LEFT JOIN kelas k ON s.id_kelas = k.id_kelas
          WHERE s.nama_siswa LIKE '%$search%'
          OR
