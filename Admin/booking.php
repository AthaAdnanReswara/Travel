<?php
@session_start();
include 'koneksi.php';

// cek apakah user admin
if (!isset($_SESSION['user']) || $_SESSION['user']['level'] != 'admin') {
  echo "<script>alert('Akses ditolak!');location.href='login.php';</script>";
  exit();
}

/**
 * Fungsi untuk update status booking
 */
function ubahStatusBooking($koneksi, $id, $status)
{
  $id = intval($id);
  $status = mysqli_real_escape_string($koneksi, $status);

  if (in_array($status, ['Pending', 'Lunas', 'Batal'])) {
    $sql = "UPDATE booking SET status='$status' WHERE id='$id'";
    return mysqli_query($koneksi, $sql);
  }
  return false;
}

// jika ada aksi update
if (isset($_GET['aksi']) && isset($_GET['id'])) {
  if (ubahStatusBooking($koneksi, $_GET['id'], $_GET['aksi'])) {
    echo "<script>alert('Status booking berhasil diperbarui!');location.href='?page=booking';</script>";
    exit();
  } else {
    echo "<script>alert('Gagal memperbarui status!');location.href='?page=booking';</script>";
    exit();
  }
}

// ambil semua data booking (join users & destinasi)
$q = mysqli_query($koneksi, "
    SELECT b.id, b.nama_pemesan, b.wa, b.email, 
           b.tanggal, b.jumlah_orang, b.total, b.status,
           u.nama AS user_nama, 
           d.nama AS destinasi_nama
    FROM booking b
    LEFT JOIN users u ON b.user_id = u.id
    LEFT JOIN destinasi d ON b.destinasi_id = d.id
    ORDER BY b.id DESC
");
?>

<style>
  /* Biar kolom aksi cukup lebar */
  .table th.aksi-col, 
  .table td.aksi-col {
    width: 180px; /* bisa disesuaikan */
    text-align: center;
    white-space: nowrap;
  }

  /* Biar tombol tidak dempet */
  .aksi-buttons a {
    margin: 2px;
  }
</style>


<div class="container">
  <h2 class="mb-4">Dashboard Booking</h2>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>WhatsApp</th>
        <th>Email</th>
        <th>Destinasi</th>
        <th>Tanggal</th>
        <th>Orang</th>
        <th>Total</th>
        <th>Status</th>
        <th class="aksi-col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      while ($row = mysqli_fetch_assoc($q)) { ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= htmlspecialchars($row['user_nama']); ?></td>
          <td><?= htmlspecialchars($row['wa']); ?></td>
          <td><?= htmlspecialchars($row['email']); ?></td>
          <td><?= htmlspecialchars($row['destinasi_nama']); ?></td>
          <td><?= $row['tanggal']; ?></td>
          <td><?= $row['jumlah_orang']; ?></td>
          <td>Rp<?= number_format($row['total'], 0, ',', '.'); ?></td>
          <td>
            <span style="background-color: <?= $row['status'] == 'Lunas' ? '#28a745' : ($row['status'] == 'Batal' ? '#dc3545' : '#ffc107'); ?>; 
               color: white; padding:5px 10px; border-radius:5px;">
              <?= $row['status']; ?>
            </span>
          </td>

          <td class="aksi-col">
            <div class="aksi-buttons">
              <?php if ($row['status'] != 'Batal') { ?>
                <a href="?page=booking&aksi=Pending&id=<?= $row['id']; ?>"
                  class="btn btn-sm btn-warning"
                  title="Pending">
                  <i class="fa-solid fa-hourglass-half"></i>
                </a>
                <a href="?page=booking&aksi=Lunas&id=<?= $row['id']; ?>"
                  class="btn btn-sm btn-success"
                  title="Lunas">
                  <i class="fa-solid fa-check-circle"></i>
                </a>
                <a href="?page=booking&aksi=Batal&id=<?= $row['id']; ?>"
                  class="btn btn-sm btn-danger"
                  title="Batal">
                  <i class="fa-solid fa-times-circle"></i>
                </a>
              <?php } else { ?>
                <span class="text-muted">-</span>
              <?php } ?>
            </div>
          </td>

        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>