<?php 
// Koneksi database
include 'koneksi.php';
 
// Menangkap data yang dikirim dari form
$id_staff = $_POST['id_staff'];
$bulan = $_POST['bulan']; 
$tahun = $_POST['tahun'];
$hadir = $_POST['hadir'];
$tdk_hadir = $_POST['tdk_hadir'];
$sakit = $_POST['sakit'];
$izin = $_POST['izin'];

// Menginput data ke database
$query = "INSERT INTO absensi (id_staff, bulan, tahun, hadir, tdk_hadir, sakit, izin) 
          VALUES ('$id_staff', '$bulan', '$tahun', '$hadir', '$tdk_hadir', '$sakit', '$izin')";

// Eksekusi query dan cek keberhasilan
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, alihkan halaman kembali ke tampil_absensi.php
    header("Location: tampil_absensi.php");
    exit(); // Pastikan script berhenti setelah redirect
} else {
    // Jika gagal, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>
