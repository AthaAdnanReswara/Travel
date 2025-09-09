<?php
include 'koneksi.php'; // koneksi ke database

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = "../gambar/";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $path = $folder . basename($gambar);

    if (move_uploaded_file($tmp, $path)) {
        $sql = "INSERT INTO destinasi (nama, deskripsi, harga, gambar, created_at) 
                VALUES ('$nama', '$deskripsi', '$harga', '$gambar', NOW())";

        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Destinasi berhasil ditambahkan!'); window.location='?page=destinasi';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Upload gambar gagal!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Destinasi</title>
</head>
<body>
    <h2>Tambah Destinasi</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required></textarea><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>

        <label>Gambar:</label><br>
        <input type="file" name="gambar" accept="image/*" required><br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="?page=destinasi">kembali</a>
    </form>
</body>
</html>
