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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: inherit;
        }


        /* Top bar */
        .top-bar {
            background-color: #007d8c;
            color: #fff;
            padding: 5px 20px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }


        /* Header */
        header {
            background-color: #fff;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }


        /* Nav bar  */
        nav ul {
            display: flex;
            list-style: none;
            gap: 20px;
            margin-left: 700px;
        }

        nav a {
            text-decoration: none;
            color: black;
            padding-bottom: 5px;
        }

        nav a:active {
            border-bottom: 2px solid blue;
            color: blue;
        }

        nav a:hover {
            border-bottom: 2px solid lightblue;
        }

        nav ul li a {
            color: #000;
            font-weight: 500;
        }

        .dashboard-btn {
            margin-left: 250px;
            background-color: #007d8c;
            padding: 8px 16px;
            border-radius: 10px;
            color: white !important;
        }

        .social-icons a {
            margin-left: 10px;
            color: #000;
            font-size: 18px;
        }



        /* Tombol WhatsApp */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            border-radius: 50px;
            padding: 12px 18px;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            text-decoration: none;
        }

        .whatsapp-float i {
            font-size: 24px;
            margin-right: 8px;
        }

        .whatsapp-float:hover {
            background-color: #20b955;
            color: white;
        }

        .hidden-card {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.6s ease;
            transform: translateY(20px);
        }

        .show-card {
            max-height: 500px;
            /* cukup besar untuk isi card */
            opacity: 1;
            transform: translateY(0);
        }

        .fo {
            background: #000000;
            color: #f1f5f9;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;

        }

        .fo .footer-blog p {
            margin: 0;
            letter-spacing: 0.5px;
        }

        .fo .footer-blog p:hover {
            color: #22c55e;
            transition: 0.3s;
        }
    </style>
    <style>
        /* kasih border radius ke pembungkus */
        .card .ratio {
            border-radius: 30px;
            /* ubah angka sesuai kebutuhan */
            overflow: hidden;
            /* biar gambar ikut ngikutin radius */
        }

        /* kalau mau gambar tetap aman */
        .card .ratio img {
            border-radius: 0;
            /* biar gak dobel radius */
        }
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

        <!-- Grid Card Bawah -->

        <!-- Grid Card Bawah -->

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/Borobudur Temple, Indonesia Part of the largest….jpeg" class="img-fluid" style="object-fit:cover;"
                            alt="Bukit Embun">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp. 1.500.000/pax</h5>
                        <p class="fw-semibold mb-1">Candi Borobudur</p>
                        <p class="small text-muted"><i class="fa-regular fa-calendar"></i> 31 MARET 2025</p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalBukit">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal 1 -->
            <div class="modal fade" id="modalBukit" tabindex="-1" aria-labelledby="modalBukitLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="modalBukitLabel">Candi Borobudur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 900px; height: 460px;"
                                class="img-fluid rounded mb-3" alt="Bukit Embun" src="gambar/Borobudur Temple, Indonesia Part of the largest….jpeg">
                            <h5 class="text-primary fw-bold">Rp. 1.500.000/pax</h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 31 Maret 2025</p>
                            <p>Paket wisata 10 hari 7 malam ke Hungary & Eastern Europe dengan fasilitas hotel
                                berbintang, transportasi nyaman, dan tour guide profesional.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="pesan.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/bukit embun.jpeg" class="img-fluid" style="object-fit:cover;" alt="Paris">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp. 1.000.000/pax</h5>
                        <p class="fw-semibold mb-1">Bukit Embun</p>
                        <p class="small text-muted"><i class="fa-regular fa-calendar"></i> 15 APRIL 2025</p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalParis">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal 2 -->
            <div class="modal fade" id="modalParis" tabindex="-1" aria-labelledby="modalParisLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="modalParisLabel">Bukit Embun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 900px; height: 460px;" src="gambar/bukit embun.jpeg"
                                class="img-fluid rounded mb-3" alt="Paris">
                            <h5 class="text-primary fw-bold">Rp. 1.000.000/pax</h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 15 April 2025</p>
                            <p>Eksplorasi keindahan Paris dan Swiss, lengkap dengan kunjungan ke Menara Eiffel, Louvre,
                                dan Pegunungan Alpen.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="pesan.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-3 card-item d-none ">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/etomia.jpeg" class="img-fluid" style="object-fit:cover;"
                            alt="Bukit Embun">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp. 33.890.000/pax</h5>
                        <p class="fw-semibold mb-1">Estonia</p>
                        <p class="small text-muted"><i class="fa-regular fa-calendar"></i> 31 MARET 2025</p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalBukit">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal 3 -->
            <div class="modal fade" id="modalBukit" tabindex="-1" aria-labelledby="modalBukitLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="modalBukitLabel">Estonia</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 900px; height: 460px;" src="g"
                                class="img-fluid rounded mb-3" alt="Bukit Embun" src="gambar/etomia.jpeg">
                            <h5 class="text-primary fw-bold">Rp. 33.890.000/pax</h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 31 Maret 2025</p>
                            <p>Paket wisata 10 hari 7 malam ke Hungary & Eastern Europe dengan fasilitas hotel
                                berbintang, transportasi nyaman, dan tour guide profesional.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="pesan.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-6 col-lg-3  card-item d-none">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/Bali nusapanida.jpeg" class="img-fluid" style="object-fit:cover;" alt="Paris">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp. 45.500.000/pax</h5>
                        <p class="fw-semibold mb-1">Bali</p>
                        <p class="small text-muted"><i class="fa-regular fa-calendar"></i> 15 APRIL 2025</p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalParis">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal 4 -->
            <div class="modal fade" id="modalParis" tabindex="-1" aria-labelledby="modalParisLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="modalParisLabel">Bali</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 900px; height: 460px;" src="gambar/Bali nusapanida.jpeg"
                                class="img-fluid rounded mb-3" alt="Paris">
                            <h5 class="text-primary fw-bold">Rp. 45.500.000/pax</h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 15 April 2025</p>
                            <p>Eksplorasi keindahan Paris dan Swiss, lengkap dengan kunjungan ke Menara Eiffel, Louvre,
                                dan Pegunungan Alpen.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="pesan.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-6 col-lg-3  card-item d-none">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/gunng.jpeg" class="img-fluid" style="object-fit:cover;"
                            alt="Bukit Embun">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp. 33.890.000/pax</h5>
                        <p class="fw-semibold mb-1">Gunung</p>
                        <p class="small text-muted"><i class="fa-regular fa-calendar"></i> 31 MARET 2025</p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalBukit">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal 5 -->
            <div class="modal fade" id="modalBukit" tabindex="-1" aria-labelledby="modalBukitLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="modalBukitLabel">Gunung</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 900px; height: 460px;" 
                                class="img-fluid rounded mb-3" alt="Bukit Embun" src="gambar/gunng.jpeg">
                            <h5 class="text-primary fw-bold">Rp. 33.890.000/pax</h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 31 Maret 2025</p>
                            <p>Paket wisata 10 hari 7 malam ke Hungary & Eastern Europe dengan fasilitas hotel
                                berbintang, transportasi nyaman, dan tour guide profesional.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="pesan.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-6 col-lg-3  card-item d-none">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/raja ampat.jpeg" class="img-fluid" style="object-fit:cover;" alt="Paris">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp. 45.500.000/pax</h5>
                        <p class="fw-semibold mb-1">Raja Ampat</p>
                        <p class="small text-muted"><i class="fa-regular fa-calendar"></i> 15 APRIL 2025</p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalParis">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal 6 -->
            <div class="modal fade" id="modalParis" tabindex="-1" aria-labelledby="modalParisLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="modalParisLabel">Raja Ampat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 900px; height: 460px;" src="gambar/raja ampat.jpeg"
                                class="img-fluid rounded mb-3" alt="Paris">
                            <h5 class="text-primary fw-bold">Rp. 45.500.000/pax</h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 15 April 2025</p>
                            <p>Eksplorasi keindahan Paris dan Swiss, lengkap dengan kunjungan ke Menara Eiffel, Louvre,
                                dan Pegunungan Alpen.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="pesan.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/matera_itali.jpeg" class="img-fluid" style="object-fit:cover;" alt="Tokyo">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp. 28.900.000/pax</h5>
                        <p class="fw-semibold mb-1">Itali</p>
                        <p class="small text-muted"><i class="fa-regular fa-calendar"></i> 10 MEI 2025</p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalTokyo">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal 7 -->
            <div class="modal fade" id="modalTokyo" tabindex="-1" aria-labelledby="modalTokyoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="modalTokyoLabel">Itali</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 900px; height: 460px;" src="gambar/matera_itali.jpeg"
                                class="img-fluid rounded mb-3" alt="Tokyo">
                            <h5 class="text-primary fw-bold">Rp. 28.900.000/pax</h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 10 Mei 2025</p>
                            <p>Menikmati musim semi di Jepang, berkunjung ke Tokyo, Kyoto, dan Osaka dengan suasana
                                sakura yang indah.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="pesan.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="gambar/singapure.jpeg" class="img-fluid"
                            style="object-fit:cover;" alt="Bali">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Rp. 9.500.000</h5>
                        <p class="fw-semibold mb-1">Singapore</p>
                        <p class="small text-muted"><i class="fa-regular fa-calendar"></i> 20 JUNI 2025</p>
                        <button class="btn btn-warning w-100 fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalBali">
                            LIHAT
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal 8 -->
            <div class="modal fade" id="modalBali" tabindex="-1" aria-labelledby="modalBaliLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="modalBaliLabel">Singapore</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img style="width: 900px; height: 460px;"
                                src="gambar/singapure.jpeg"
                                class="img-fluid rounded mb-3" alt="Bali">
                            <h5 class="text-primary fw-bold">Rp. 9.500.000</h5>
                            <p><i class="fa-regular fa-calendar"></i> Berangkat: 20 Juni 2025</p>
                            <p>Paket wisata 5 hari 4 malam di Bali & Nusa Penida dengan pantai indah, snorkeling, dan
                                budaya khas Bali.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="pesan.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap JS (wajib untuk modal) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



        <!-- Tombol WhatsApp -->
        <a href="https://wa.me/6281913204811?text=Hallo,%20saya%20ingin%20memesan%20tiket%20perjalanan%20treveling..."
                target="_blank" rel="noopener" class="whatsapp-float">
            <i class="fab fa-whatsapp"></i> Live Chat
        </a>

        <!-- Tambah card lainnya sesuai kebutuhan -->
    </div>

    <!-- Load More -->
    <div class="text-center mt-4">
        <button id="expandBtn" class="btn btn-primary">Lihat Lebih Banyak</button>
    </div>
    <br>
    <div>
        <footer class="fo">
            <div class="footer-blog">
                <p>Copyright @ 2025 69Travel, All Rights Reserved</p>
            </div>
        </footer>
    </div>

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