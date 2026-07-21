-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2026 pada 01.09
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim_nis` varchar(30) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `nim_nis`, `jenis_kelamin`, `alamat`, `no_hp`, `tanggal_daftar`) VALUES
(1, 'Budi', '230180001', 'L', 'Lhokseumawe', '081234567890', '2026-07-21'),
(2, 'Siti', '230180002', 'P', 'Lhokseumawe', '081234567891', '2026-07-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `isbn` varchar(30) DEFAULT NULL,
  `stok` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `stok`) VALUES
(1, NULL, 'Sains', 'Pemrograman PHP & MySQL Modern', 'Eko Kurniawan', 'Informatika', '2023', NULL, 10),
(2, NULL, 'Novel', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2008', NULL, 5),
(3, NULL, 'Sejarah', 'Sejarah Dunia Yang Disembunyikan', 'Jonathan Black', 'Alvabet', '2015', NULL, 7),
(4, NULL, 'Horor', 'Kisah Tanah Jawa', 'Om Hao', 'GagasMedia', '2019', NULL, 4),
(5, NULL, 'Agama', 'Menata Hati Menjemput Ridho', 'Aa Gym', 'Emqies', '2021', NULL, 8),
(16, NULL, 'Sains, Teknologi', 'A Brief History of Time', 'Stephen Hawking', 'Bantam Books', '1988', NULL, 5),
(17, NULL, 'Agama', 'Al-Quran dan Terjemahnya', 'Tim Lajnah Pentashihan Mushaf Al-Qura', 'Kementerian Agama RI', '2014', NULL, 3),
(18, NULL, 'Novel', 'Dilan: Dia Dilanku Tahun 1990', 'Pidi Baiq', 'Mizan', '2014', NULL, 17),
(19, NULL, 'Pendidikan, Sejarah', 'The 7 Habits of Highly Effective People', 'Stephen R. Covey', 'Simon & Schuster', '1989', NULL, 9),
(21, NULL, 'Novel, Sejarah', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', '1980', NULL, 10),
(22, NULL, 'Pendidikan', 'Metode Penelitian Kuantitatif, Kualitatif, dan R&D', 'Prof. Dr. Sugiyono', 'Alfabeta', '2010', NULL, 9),
(23, NULL, 'Pendidikan', 'Matematika Dasar', 'Budi Santoso', 'Erlangga', '2020', NULL, 13),
(24, NULL, 'Pendidikan, Teknologi', 'Pemrograman PHP', 'Abdul Kadir', 'Andi', '2022', NULL, 16),
(25, NULL, 'Sains, Sejarah', 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'Harvill Secker', '2011', NULL, 15),
(26, NULL, 'Novel, Agama', 'Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 'Basmala & Republika', '2004', NULL, 11),
(27, NULL, 'Pendidikan, Agama', 'Filsafat Pendidikan Islam', 'Prof. Dr. H. Ramayulis', 'Kalam Mulia', '2002', NULL, 10),
(28, NULL, 'Sejarah', 'Sejarah Dunia Abad Pertengahan', 'Susan Wise Bauer', 'Qanita', '2010', NULL, 7),
(29, NULL, 'Agama', 'Fikih Sunnah', 'Sayyid Sabiq', 'Dar al-Fikr', '1946', NULL, 11),
(30, NULL, 'Novel, Agama', 'Rindu', 'Tere Liye', 'Republika', '2014', NULL, 14),
(31, NULL, 'Novel, Misteri', 'The Da Vinci Code', 'Dan Brown', 'Doubleday', '2003', NULL, 9),
(32, NULL, 'Pendidikan, Teknologi', 'The C Programming Language', 'Brian Kernighan & Dennis Ritchie', 'Prentice Hall', '1978', NULL, 18),
(33, NULL, 'Sains', 'Pemrograman PHP & MySQL Modern', 'Eko Kurniawan', 'Informatika', '2023', NULL, 10),
(34, NULL, 'Novel', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2008', NULL, 5),
(37, NULL, 'Agama', 'Menata Hati Menjemput Ridho', 'Aa Gym', 'Emqies', '2021', NULL, 8),
(38, 1, 'Novel, Misteri, Horor', 'Journal of Terror: Kembar', 'Sweta Kartika', 'M&C!', '2019', NULL, 18),
(39, 1, 'Novel, Horor', 'KKN di Desa Penari', 'Simpleman', 'Bukuné', '2019', NULL, 6),
(40, 1, 'Novel', 'Milea: Suara dari Dilan', 'Pidi Baiq', 'Pastel Books', '2016', NULL, 12),
(41, 3, 'Pendidikan', 'Sosiologi Pendidikan', 'Prof. Dr. Ary H. Gunawan', 'Rineka Cipta', '2000', NULL, 12),
(42, 1, 'Sains, Pendidikan, Teknologi', 'Neuromancer', 'William Gibson', 'Ace Books', '1984', NULL, 11),
(43, 4, 'Sejarah', 'Sejarah Indonesia Modern', 'M.C. Ricklefs', 'Serambi Ilmu Semesta', '2008', NULL, 9),
(44, 3, 'Pendidikan, Sejarah', 'Pengantar Sejarah Indonesia Baru: Sejarah Pergerakan Nasional', 'Prof. Dr. Sartono Kartodirdjo', 'Penerbit Ombak', '2017', NULL, 17),
(45, 4, 'Sejarah', ' Laut Bercerita', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia (KPG)', '2017', NULL, 7),
(46, 3, 'Pendidikan', 'Pendidikan yang Berkebudayaan', 'Yudi Latif', 'PT Gramedia Pustaka Utama', '2020', NULL, 9),
(47, 1, 'Sains', 'A Brief History of Time (Riwayat Singkat Waktu)', 'Stephen Hawking', 'KPG (Kepustakaan Populer Gramedia)', '2025', NULL, 9),
(48, 1, 'Sains, Sejarah', 'Kisah Manusia dalam DNA (A Brief History of Everyone Who Ever Lived)', 'Adam Rutherford', ' Gramedia Pustaka Utama', '2021', NULL, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail`, `id_peminjaman`, `id_buku`, `jumlah`) VALUES
(1, 1, 24, 1),
(2, 2, 24, 1),
(3, 3, 24, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Novel'),
(2, 'Teknologi'),
(3, 'Pendidikan'),
(4, 'Sejarah'),
(5, 'Agama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nama_peminjam` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `status` enum('Dipinjam','Dikembalikan') DEFAULT 'Dipinjam',
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nama_peminjam`, `umur`, `jenis_kelamin`, `id_anggota`, `tanggal_pinjam`, `tanggal_jatuh_tempo`, `status`, `tgl_pinjam`, `tgl_kembali`) VALUES
(1, 'Yulisya', 17, 'Wanita', NULL, NULL, NULL, 'Dipinjam', '2026-07-21', '2026-07-28'),
(2, 'Yulisya', 17, 'Wanita', NULL, NULL, NULL, 'Dipinjam', '2026-07-21', '2026-07-28'),
(3, 'Yulisya', 17, 'Wanita', NULL, NULL, NULL, 'Dipinjam', '2026-07-21', '2026-07-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `tgl_kembali` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `denda` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
