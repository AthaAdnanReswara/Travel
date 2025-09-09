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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f9fc;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }
        .btn-custom {
            background: #007bff;
            color: white;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background: #0056b3;
            color: #fff;
        }
        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card p-4">
                    <h3 class="text-center mb-4">Tambah Destinasi ✈️</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama Destinasi</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama destinasi" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tuliskan deskripsi destinasi..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 1500000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Gambar</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="?page=destinasi" class="btn btn-secondary">⬅ Kembali</a>
                            <button type="submit" name="simpan" class="btn btn-custom">💾 Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
