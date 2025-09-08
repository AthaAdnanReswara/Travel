<?php
include 'koneksi.php';

$destinasi_id = $_GET['id'];
$destinasi_query = mysqli_query($koneksi, "SELECT * FROM destinasi WHERE id = '$destinasi_id'");
$data = mysqli_fetch_assoc($destinasi_query);

if (isset($_POST['submit'])) {
    $nama       = $_POST['nama'];
    $deskripsi  = $_POST['deskripsi'];
    $harga      = $_POST['harga'];

    // cek jika ada upload gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];
        $folder = "gambar/";

        $ext_valid = ['jpg', 'jpeg', 'png'];
        $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

        if (in_array($ext, $ext_valid)) {
            $newName = time() . "_" . uniqid() . "." . $ext;
            if (move_uploaded_file($tmp, $folder . $newName)) {
                // hapus gambar lama kalau ada
                if (!empty($data['gambar']) && file_exists($folder . $data['gambar'])) {
                    unlink($folder . $data['gambar']);
                }
                $gambar_final = $newName;
            } else {
                $gambar_final = $data['gambar'];
            }
        } else {
            echo "<script>alert('Format gambar tidak valid! Harus jpg/png'); window.history.back();</script>";
            exit;
        }
    } else {
        $gambar_final = $data['gambar']; // pakai gambar lama
    }

    $query = "UPDATE destinasi SET 
                nama = '$nama',
                deskripsi = '$deskripsi',
                harga = '$harga',
                gambar = '$gambar_final'
              WHERE id = '$destinasi_id'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Destinasi berhasil diedit!'); window.location.href='?page=destinasi';</script>";
    } else {
        echo "<script>alert('Gagal mengedit destinasi: " . mysqli_error($koneksi) . "'); window.location.href='?page=destinasi';</script>";
    }
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Edit Destinasi</h2>

    <form method="post" enctype="multipart/form-data" class="border p-4 rounded shadow-sm">
        <div class="mb-3">
            <label class="form-label">Nama Destinasi</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= $data['harga']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label><br>
            <?php if (!empty($data['gambar'])) { ?>
                <img src="../gambar/<?= $data['gambar']; ?>" width="150" class="img-thumbnail mb-2"><br>
            <?php } ?>
            <input type="file" name="gambar" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="?page=destinasi" class="btn btn-secondary">Kembali</a>
    </form>
</div>