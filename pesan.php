<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Traveling</title>
    <!-- (Opsional) Tambahkan Bootstrap Icon WhatsApp -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-custom {
            border-radius: 12px;
        }

        .summary {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
        }
    </style>

    <style>
        .kirim {
            display: inline-block;
            background: linear-gradient(135deg, #25D366, #1EBE57);
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            padding: 12px 22px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .kirim:hover {
            background: linear-gradient(135deg, #1EBE57, #128C7E);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 15px rgba(18, 140, 126, 0.4);
            text-decoration: none;
            color: #fff;
        }

        .kirim:active {
            transform: scale(0.97);
        }

        .btn-booking {
            display: inline-block;
            background: linear-gradient(135deg, #023085ff, #0077ffff);
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .btn-booking:hover {
            background: linear-gradient(135deg, #09c9c9ff, #0a2497ff);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 15px rgba(18, 140, 126, 0.4);
        }

        .btn-booking:active {
            transform: scale(0.97);
        }
    </style>

</head>

<body class="p-4">

    <!-- Daftar Booking -->
    <div class="container">
        <h5>Daftar Booking <span class="badge bg-secondary" id="countBooking">0</span></h5>
        <!-- <div class="table-responsive mb-3">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Destinasi</th>
                        <th>Tgl Berangkat</th>
                        <th>Orang</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="bookingList"></tbody>
            </table>
        </div>
        <button class="btn btn-outline-danger btn-sm mb-3" onclick="clearBooking()">Bersihkan</button> -->

        <div class="row">
            <!-- Form Booking -->
            <div class="col-md-8">
                <div class="card card-custom shadow-sm p-3">
                    <form id="bookingForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">No. WhatsApp</label>
                                <input type="text" class="form-control" id="wa" placeholder="62812xxxx" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Destinasi</label>
                                <select class="form-select" id="destinasi" required>
                                    <option value="">Pilih destinasi</option>
                                    <option value="Candi borobudur" data-harga="1500000">Candi Borobudur - Rp1.500.000</option>
                                    <option value="Bukit embun" data-harga="1000000">Bukit embun - Rp1.000.000</option>
                                    <option value="Italia" data-harga="2890000">Italia - Rp28.900.000</option>
                                    <option value="Singapore" data-harga="9500000">Singapore - Rp9.500.000</option>
                                    <option value="Gunung" data-harga="33890000">Gunung - Rp33.890.000</option>
                                    <option value="Raja Ampat" data-harga="45500000">Raja Ampat - Rp45.500.000</option>
                                    <option value="Gunung" data-harga="33890000">Gunung - Rp33.890.000</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Berangkat</label>
                                <input type="date" class="form-control" id="tanggal" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jumlah Orang</label>
                                <input type="number" class="form-control" id="orang" value="1" min="1" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Metode Bayar</label>
                                <select class="form-select" id="metode">
                                    <option value="Transfer">Transfer</option>
                                    <option value="Kartu Kredit">Kartu Kredit</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Catatan (opsional)</label>
                                <input type="text" class="form-control" id="catatan" placeholder="Request khusus, jadwal, dll">
                            </div>
                        </div>

                        <!-- Estimasi & Button -->
                        <div class="mt-3">
                            <p>Estimasi total: <span class="fw-bold text-primary" id="totalHarga">Rp0</span></p>
                            <a class="kirim"
                                href="https://wa.me/6281913204811?text=Hallo,%20saya%20ingin%20bertanya%20tentang%20perjalanan%20treveling..."
                                target="_blank" rel="noopener">
                                <i class="bi bi-whatsapp"></i> Kirim via WhatsApp
                            </a>
                            <button  class="btn-booking">
                                <a href="store.php" style="color: black; text-decoration:none;">Pesanan yang lain</a> 
                            </button>
                            <!-- <button type="submit" class="btn-booking">
                                <i class="bi bi-cart-check"></i> Booking Online
                            </button> -->
                        </div>
                    </form>
                </div>
            </div>

            <!-- Ringkasan -->
            <div class="col-md-4">
                <div class="summary shadow-sm">
                    <h6>Ringkasan</h6>
                    <p id="ringkasan">
                        Destinasi: - <br>
                        Tanggal: - <br>
                        Orang: 1 <br>
                        Metode Bayar: Transfer
                    </p>
                    <small class="text-muted">* Harga dapat berubah sesuai musim & ketersediaan. Admin akan mengonfirmasi setelah pemesanan.</small>
                </div>
            </div>
        </div>
    </div>

    <script>
        let bookingData = [];
        let harga = 0;

        document.getElementById("destinasi").addEventListener("change", updateTotal);
        document.getElementById("orang").addEventListener("input", updateTotal);

        function updateTotal() {
            let destinasi = document.getElementById("destinasi");
            let hargaDestinasi = destinasi.options[destinasi.selectedIndex]?.dataset.harga || 0;
            let orang = parseInt(document.getElementById("orang").value) || 1;
            harga = hargaDestinasi * orang;
            document.getElementById("totalHarga").innerText = "Rp" + harga.toLocaleString();

            updateRingkasan();
        }

        function updateRingkasan() {
            document.getElementById("ringkasan").innerHTML = `
        Destinasi: ${document.getElementById("destinasi").value || "-"} <br>
        Tanggal: ${document.getElementById("tanggal").value || "-"} <br>
        Orang: ${document.getElementById("orang").value} <br>
        Metode Bayar: ${document.getElementById("metode").value}
      `;
        }

        document.getElementById("bookingForm").addEventListener("submit", function(e) {
            e.preventDefault();
            let data = {
                nama: document.getElementById("nama").value,
                wa: document.getElementById("wa").value,
                email: document.getElementById("email").value,
                destinasi: document.getElementById("destinasi").value,
                tanggal: document.getElementById("tanggal").value,
                orang: document.getElementById("orang").value,
                metode: document.getElementById("metode").value,
                catatan: document.getElementById("catatan").value,
                total: harga
            };
            bookingData.push(data);
            renderTable();
            document.getElementById("bookingForm").reset();
            updateRingkasan();
            document.getElementById("totalHarga").innerText = "Rp0";
        });

        function renderTable() {
            let tbody = document.getElementById("bookingList");
            tbody.innerHTML = "";
            bookingData.forEach((b, i) => {
                tbody.innerHTML += `
          <tr>
            <td>${i+1}</td>
            <td>${b.nama}</td>
            <td>${b.destinasi}</td>
            <td>${b.tanggal}</td>
            <td>${b.orang}</td>
            <td>Rp${b.total.toLocaleString()}</td>
            <td><span class="badge bg-warning">Pending</span></td>
            <td><button class="btn btn-sm btn-danger" onclick="deleteBooking(${i})">Hapus</button></td>
          </tr>
        `;
            });
            document.getElementById("countBooking").innerText = bookingData.length;
        }

        function deleteBooking(i) {
            bookingData.splice(i, 1);
            renderTable();
        }

        function clearBooking() {
            bookingData = [];
            renderTable();
        }

        function sendWhatsApp() {
            let nama = document.getElementById("nama").value;
            let wa = document.getElementById("wa").value;
            let destinasi = document.getElementById("destinasi").value;
            let tanggal = document.getElementById("tanggal").value;
            let orang = document.getElementById("orang").value;
            let metode = document.getElementById("metode").value;
            let pesan = `Halo, saya ingin booking:\nNama: ${nama}\nDestinasi: ${destinasi}\nTanggal: ${tanggal}\nOrang: ${orang}\nMetode: ${metode}`;
            window.open(`https://wa.me/${wa}?text=${encodeURIComponent(pesan)}`, "_blank");
        }
    </script>
</body>

</html>