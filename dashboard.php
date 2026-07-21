<?php
session_start();

// 1. Cek Status Login
if (!isset($_SESSION['id_admin']) && !isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

// 2. Load Koneksi Database
if (file_exists("koneksi.php")) {
    include "koneksi.php";
} elseif (file_exists("config/koneksi.php")) {
    include "config/koneksi.php";
}

// Penyelaras Variabel Koneksi ($conn / $koneksi)
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

// 3. Query Hitung Total Ringkasan Data
$q_buku         = mysqli_query($conn, "SELECT * FROM buku");
$total_buku     = $q_buku ? mysqli_num_rows($q_buku) : 0;

$q_peminjaman   = mysqli_query($conn, "SELECT * FROM peminjaman");
$peminjaman     = $q_peminjaman ? mysqli_num_rows($q_peminjaman) : 0;

$q_pengembalian = mysqli_query($conn, "SELECT * FROM pengembalian");
$pengembalian   = $q_pengembalian ? mysqli_num_rows($q_pengembalian) : 0;

// 4. Query Hitung Jumlah Buku Per Kategori Secara Spesifik
$q_sains   = mysqli_query($conn, "SELECT * FROM buku WHERE kategori LIKE '%sains%' OR kategori LIKE '%Sains%'");
$jml_sains = $q_sains ? mysqli_num_rows($q_sains) : 0;

$q_novel   = mysqli_query($conn, "SELECT * FROM buku WHERE kategori LIKE '%novel%' OR kategori LIKE '%Novel%'");
$jml_novel = $q_novel ? mysqli_num_rows($q_novel) : 0;

$q_sejarah = mysqli_query($conn, "SELECT * FROM buku WHERE kategori LIKE '%sejarah%' OR kategori LIKE '%Sejarah%'");
$jml_sejarah = $q_sejarah ? mysqli_num_rows($q_sejarah) : 0;

$q_horor   = mysqli_query($conn, "SELECT * FROM buku WHERE kategori LIKE '%horor%' OR kategori LIKE '%Horor%' OR kategori LIKE '%misteri%' OR kategori LIKE '%Misteri%'");
$jml_horor = $q_horor ? mysqli_num_rows($q_horor) : 0;

$q_agama   = mysqli_query($conn, "SELECT * FROM buku WHERE kategori LIKE '%agama%' OR kategori LIKE '%Agama%' OR kategori LIKE '%spiritual%' OR kategori LIKE '%Spiritual%'");
$jml_agama = $q_agama ? mysqli_num_rows($q_agama) : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Sistem Perpustakaan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        @media (min-width: 768px) {
            .sidebar-fixed {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 100;
                overflow-y: auto;
            }
            .main-content {
                margin-left: 25%;
            }
        }
        @media (min-width: 992px) {
            .main-content {
                margin-left: 16.66667%;
            }
        }
        .card-kategori {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }
        .card-kategori:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15) !important;
        }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row">
        
        <!-- SIDEBAR (FIXED) -->
        <div class="col-md-3 col-lg-2 bg-dark sidebar-fixed p-0">
            <?php 
            if (file_exists("includes/sidebar.php")) {
                include "includes/sidebar.php";
            } elseif (file_exists("sidebar.php")) {
                include "sidebar.php";
            } else {
                echo '<div class="p-3 text-white">Sidebar file tidak ditemukan!</div>';
            }
            ?>
        </div>

        <!-- KONTEN UTAMA -->
        <div class="col-md-9 col-lg-10 main-content p-4 p-md-5">

            <!-- HEADER SAMBUTAN -->
            <div class="mb-4">
                <h1 class="fw-bold display-5">Selamat Datang, <?= htmlspecialchars($_SESSION['nama'] ?? 'Administrator'); ?> 👋</h1>
                <p class="fs-4 text-muted">Mari melihat dunia bersama dengan membaca</p>
            </div>

            <!-- BANNER PERPUSTAKAAN DIGITAL KITA -->
            <div class="card bg-primary text-white border-0 shadow-lg rounded-4 p-4 p-md-5 mb-5">
                <div class="mb-4">
                    <h2 class="fw-bold display-5 mb-3 d-flex align-items-center gap-3">
                        <span>📖</span> Perpustakaan Digital Kita
                    </h2>
                    <p class="fs-4 text-white-50 mb-0 col-lg-11" style="line-height: 1.6;">
                        Jelajahi ribuan literatur, tingkatkan wawasan, dan kelola aktivitas peminjaman buku dengan mudah dan efisien.
                    </p>
                </div>

                <!-- 5 KOTAK KATEGORI BUKU (MENGARAH KE KATALOG) -->
                <div class="row g-3 mt-2">
                    
                    <!-- 1. SAINS -->
                    <div class="col-md-4">
                        <a href="admin/katalog.php?kategori=Sains" class="text-decoration-none">
                            <div class="card border-0 bg-white text-dark p-3 p-lg-4 rounded-3 shadow-sm h-100 d-flex flex-row align-items-center justify-content-between card-kategori">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="fs-1">📘</span>
                                    <div>
                                        <div class="text-muted fw-bold fs-6 text-uppercase">Buku Sains</div>
                                        <div class="fw-bold fs-5 text-primary">Eksplorasi Dunia</div>
                                    </div>
                                </div>
                                <span class="badge bg-primary fs-6 px-3 py-2 rounded-pill"><?= $jml_sains; ?> Buku</span>
                            </div>
                        </a>
                    </div>

                    <!-- 2. NOVEL -->
                    <div class="col-md-4">
                        <a href="admin/katalog.php?kategori=Novel" class="text-decoration-none">
                            <div class="card border-0 bg-white text-dark p-3 p-lg-4 rounded-3 shadow-sm h-100 d-flex flex-row align-items-center justify-content-between card-kategori">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="fs-1">📗</span>
                                    <div>
                                        <div class="text-muted fw-bold fs-6 text-uppercase">Buku Novel</div>
                                        <div class="fw-bold fs-5 text-success">Kisah & Petualangan</div>
                                    </div>
                                </div>
                                <span class="badge bg-success fs-6 px-3 py-2 rounded-pill"><?= $jml_novel; ?> Buku</span>
                            </div>
                        </a>
                    </div>

                    <!-- 3. SEJARAH -->
                    <div class="col-md-4">
                        <a href="admin/katalog.php?kategori=Sejarah" class="text-decoration-none">
                            <div class="card border-0 bg-white text-dark p-3 p-lg-4 rounded-3 shadow-sm h-100 d-flex flex-row align-items-center justify-content-between card-kategori">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="fs-1">📙</span>
                                    <div>
                                        <div class="text-muted fw-bold fs-6 text-uppercase">Buku Sejarah</div>
                                        <div class="fw-bold fs-5 text-warning">Jejak Peradaban</div>
                                    </div>
                                </div>
                                <span class="badge bg-warning text-white fs-6 px-3 py-2 rounded-pill"><?= $jml_sejarah; ?> Buku</span>
                            </div>
                        </a>
                    </div>

                    <!-- 4. HOROR -->
                    <div class="col-md-6">
                        <a href="admin/katalog.php?kategori=Horor" class="text-decoration-none">
                            <div class="card border-0 bg-white text-dark p-3 p-lg-4 rounded-3 shadow-sm h-100 d-flex flex-row align-items-center justify-content-between card-kategori">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="fs-1">👻</span>
                                    <div>
                                        <div class="text-muted fw-bold fs-6 text-uppercase">Buku Horor</div>
                                        <div class="fw-bold fs-5 text-danger">Misteri & Ketegangan</div>
                                    </div>
                                </div>
                                <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill"><?= $jml_horor; ?> Buku</span>
                            </div>
                        </a>
                    </div>

                    <!-- 5. AGAMA -->
                    <div class="col-md-6">
                        <a href="admin/katalog.php?kategori=Agama" class="text-decoration-none">
                            <div class="card border-0 bg-white text-dark p-3 p-lg-4 rounded-3 shadow-sm h-100 d-flex flex-row align-items-center justify-content-between card-kategori">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="fs-1">🌙</span>
                                    <div>
                                        <div class="text-muted fw-bold fs-6 text-uppercase">Buku Agama</div>
                                        <div class="fw-bold fs-5 text-info">Kedamaian & Spiritual</div>
                                    </div>
                                </div>
                                <span class="badge bg-info text-white fs-6 px-3 py-2 rounded-pill"><?= $jml_agama; ?> Buku</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            <!-- AKSES CEPAT (3 TOMBOL) -->
            <h3 class="fw-bold mb-3 d-flex align-items-center gap-2">
                <span>🚀</span> Akses Cepat
            </h3>
            <div class="row g-3 mb-5">
                <div class="col-md-4">
                    <a href="admin/buku.php" class="btn btn-success w-100 py-3 fs-5 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-plus-lg"></i> Tambah Buku
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="admin/peminjaman.php" class="btn btn-primary w-100 py-3 fs-5 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-journal-bookmark"></i> Transaksi Pinjam
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="admin/pengembalian.php" class="btn btn-warning text-white w-100 py-3 fs-5 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-arrow-counterclockwise"></i> Pengembalian
                    </a>
                </div>
            </div>

            <!-- STATISTIK RINGKASAN (3 KARTU SIMETRIS) -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm border-start border-primary border-5 p-4 rounded-3">
                        <small class="text-uppercase text-muted fw-bold fs-6">TOTAL BUKU</small>
                        <h1 class="fw-bold text-primary my-2 display-6"><?= $total_buku; ?></h1>
                        <a href="admin/buku.php" class="text-decoration-none text-primary fw-semibold fs-6">Lihat detail →</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm border-start border-warning border-5 p-4 rounded-3">
                        <small class="text-uppercase text-muted fw-bold fs-6">PEMINJAMAN</small>
                        <h1 class="fw-bold text-warning my-2 display-6"><?= $peminjaman; ?></h1>
                        <a href="admin/peminjaman.php" class="text-decoration-none text-warning fw-semibold fs-6">Lihat detail →</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm border-start border-info border-5 p-4 rounded-3">
                        <small class="text-uppercase text-muted fw-bold fs-6">PENGEMBALIAN</small>
                        <h1 class="fw-bold text-info my-2 display-6"><?= $pengembalian; ?></h1>
                        <a href="admin/pengembalian.php" class="text-decoration-none text-info fw-semibold fs-6">Lihat detail →</a>
                    </div>
                </div>
            </div>

            <!-- GRAFIK PENGUNJUNG PERPUSTAKAAN -->
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                    <h3 class="fw-bold m-0 d-flex align-items-center gap-2">
                        <span>📊</span> Grafik Pengunjung Perpustakaan
                    </h3>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary active fw-semibold" id="btnMingguan" onclick="updateChart('mingguan')">Mingguan</button>
                        <button type="button" class="btn btn-outline-primary fw-semibold" id="btnBulanan" onclick="updateChart('bulanan')">Bulanan</button>
                        <button type="button" class="btn btn-outline-primary fw-semibold" id="btnTahunan" onclick="updateChart('tahunan')">Tahunan</button>
                    </div>
                </div>
                <div style="position: relative; height: 350px;">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const chartData = {
        mingguan: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            data: [35, 42, 28, 55, 60, 20, 15]
        },
        bulanan: {
            labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            data: [180, 240, 210, 310]
        },
        tahunan: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            data: [850, 920, 1100, 1050, 1300, 1250, 1400, 1350, 1200, 1500, 1600, 1750]
        }
    };

    const ctx = document.getElementById('visitorChart').getContext('2d');
    
    let visitorChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.mingguan.labels,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: chartData.mingguan.data,
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.15)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true, position: 'top' }
            },
            scales: {
                y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.05)' } },
                x: { grid: { display: false } }
            }
        }
    });

    function updateChart(filter) {
        document.getElementById('btnMingguan').classList.remove('active');
        document.getElementById('btnBulanan').classList.remove('active');
        document.getElementById('btnTahunan').classList.remove('active');

        if (filter === 'mingguan') {
            document.getElementById('btnMingguan').classList.add('active');
            visitorChart.data.labels = chartData.mingguan.labels;
            visitorChart.data.datasets[0].data = chartData.mingguan.data;
        } else if (filter === 'bulanan') {
            document.getElementById('btnBulanan').classList.add('active');
            visitorChart.data.labels = chartData.bulanan.labels;
            visitorChart.data.datasets[0].data = chartData.bulanan.data;
        } else if (filter === 'tahunan') {
            document.getElementById('btnTahunan').classList.add('active');
            visitorChart.data.labels = chartData.tahunan.labels;
            visitorChart.data.datasets[0].data = chartData.tahunan.data;
        }

        visitorChart.update();
    }
</script>
</body>
</html>