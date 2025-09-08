<?php
include 'Admin/koneksi.php';
session_start();

// Query ambil semua destinasi
$sql = "SELECT * FROM destinasi ORDER BY created_at DESC";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour International</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {margin: 0;padding: 0;box-sizing: border-box;}
        a {text-decoration: none;color: inherit;}

        /* Top bar */
        .top-bar {background-color: #007d8c;color: #fff;padding: 5px 20px;display: flex;justify-content: space-between;font-size: 14px;}

        /* Header */
        header {background-color: #fff;padding: 15px 20px;display: flex;align-items: center;justify-content: space-between;color: #000;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);}
        .logo {font-size: 20px;font-weight: bold;}

        /* Nav bar  */
        nav ul {display: flex;list-style: none;gap: 20px;margin-left: 700px;}
        nav a {text-decoration: none;color: black;padding-bottom: 5px;}
        nav a:hover {border-bottom: 2px solid lightblue;}
        nav ul li a {color: #000;font-weight: 500;}
        .dashboard-btn {margin-left: 250px;background-color: #007d8c;padding: 8px 16px;border-radius: 10px;color: white !important;}

        .social-icons a {margin-left: 10px;color: #000;font-size: 18px;}

        /* Tombol WhatsApp */
        .whatsapp-float {position: fixed;bottom: 20px;right: 20px;background-color: #25D366;color: white;border-radius: 50px;padding: 12px 18px;font-size: 16px;font-weight: 600;display: flex;align-items: center;box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);z-index: 1000;text-decoration: none;}
        .whatsapp-float i {font-size: 24px;margin-right: 8px;}
        .whatsapp-float:hover {background-color: #20b955;color: white;}

        .fo {background: #000000;color: #f1f5f9;padding: 20px 0;text-align: center;font-size: 14px;}
        .fo .footer-blog p {margin: 0;letter-spacing: 0.5px;}
        .fo .footer-blog p:hover {color: #22c55e;transition: 0.3s;}

        /* Card */
        .card .ratio {border-radius: 30px;overflow: hidden;}
        .card .ratio img {border-radius: 0;}
    </style>
</head>

<body class="bg-light">

    <!-- Top Info -->
    <div class="top-bar">
        <div class="left-info">69travel@gmail.com</div>
        <div class="right-info">Bandar Lampung, Teluk Betung</div>
    </div>

    <!-- Header Navigation -->
    <header>
        <div class="logo">69 Travel</div>
        <nav>
            <ul>
                <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="Admin/logout.php" class="dash">Logout</a></li>
                <?php } else { ?>
                    <li><a href="Admin/login.php" class="dash">Login</a></li>
                <?php } ?>
                <li><a href="index.php" class="dashboard-btn">Home</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-x-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
    </header>

    <!-- Section -->
    <div class="container py-3">
        <h2 class="text-center mb-4 fw-bold">✈️ Paket Wisata Populer</h2>

        <div class="row g-4">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/<?php echo $row['gambar']; ?>" class="img-fluid" style="object-fit:cover;"
                            alt="<?php echo $row['nama']; ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h5>
                        <p class="fw-semibold mb-1"><?php echo $row['nama']; ?></p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalDestinasi<?php echo $row['id']; ?>">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Detail -->
            <div class="modal fade" id="modalDestinasi<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold"><?php echo $row['nama']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 100%; height: 400px; object-fit:cover;"
                                class="img-fluid rounded mb-3" src="gambar/<?php echo $row['gambar']; ?>">
                            <h5 class="text-primary fw-bold">Harga: Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 31 Maret 2025</p>
                            <p><?php echo $row['deskripsi']; ?></p>
                        </div>
                        <div class="modal-footer">
                            <?php if (!isset($_SESSION['user'])) { ?>
                                <!-- Kalau belum login, munculkan modal login -->
                                <button class="btn btn-success fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#modalLogin" data-bs-dismiss="modal">
                                    Pesan Sekarang
                                </button>
                            <?php } else { ?>
                                <!-- Kalau sudah login, langsung ke halaman pesan -->
                                <a href="pesan.php?destinasi=<?= $row['id'] ?>"  class="btn btn-success fw-bold">
                                    Pesan Sekarang
                                </a>
                            <?php } ?>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Login Dulu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Anda harus login terlebih dahulu untuk memesan paket wisata.</p>
                    <div class="text-center">
                        <a href="Admin/login.php" class="btn btn-success fw-bold">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol WhatsApp -->
    <a href="https://wa.me/6281913204811?text=Hallo,%20saya%20ingin%20memesan%20tiket%20perjalanan%20treveling..."
        target="_blank" rel="noopener" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i> Live Chat
    </a>

    <div class="text-center mt-4">
        <button id="expandBtn" class="btn btn-primary">Lihat Lebih Banyak</button>
    </div>
    <br>
    <footer class="fo">
        <div class="footer-blog">
            <p>Copyright @ 2025 69Travel, All Rights Reserved</p>
        </div>
    </footer>

    <!-- Script Expand -->
    <script>
        const expandBtn = document.getElementById('expandBtn');
        const hiddenCards = document.querySelectorAll('.card-item.d-none');
        let expanded = false;

        expandBtn.addEventListener('click', () => {
            if (!expanded) {
                hiddenCards.forEach(card => card.classList.remove('d-none'));
                expandBtn.textContent = "Sembunyikan";
                expanded = true;
            } else {
                hiddenCards.forEach(card => card.classList.add('d-none'));
                expandBtn.textContent = "Lihat Lebih Banyak";
                expanded = false;
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
