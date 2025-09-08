<div class="container mt-4">
    <h2 class="mb-4">Destinasi </h2>
    

    <!-- Tombol tambah -->
    <a href="?page=destinasi_tambah" class="btn btn-success mb-3">+ Tambah Destinasi</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th style="width: 13%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM destinasi ORDER BY created_at DESC");
        if (mysqli_num_rows($query) > 0) {
            while($data = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td>
                        <?php if (!empty($data['gambar'])) { ?>
                            <img src="../gambar/<?= $data['gambar']; ?>" width="100" class="img-thumbnail">
                        <?php } else { ?>
                            <span class="text-muted">Tidak ada gambar</span>
                        <?php } ?>
                    </td>
                    <td><?= htmlspecialchars($data['nama']); ?></td>
                    <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                    <td><?= nl2br(htmlspecialchars($data['deskripsi'])); ?></td>
                    <td>
                        <a href="?page=destinasi_ubah&&id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="?page=destinasi_hapus&&id=<?= $data['id']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus destinasi ini?');" 
                           class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada destinasi.</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
