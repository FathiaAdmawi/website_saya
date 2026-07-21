<?php
// Tampilkan error jika ada masalah lain nanti
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host     = "localhost";
$user     = "root";
$password = "";
$database = "sistem_perpustakaan";

// Buat koneksi utama
$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// SOLUSI: Samakan $conn dengan $koneksi agar SEMUA file PHP bisa membacanya!
$conn = $koneksi; 
?>