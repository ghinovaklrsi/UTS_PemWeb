<?php

// Include koneksi database
include('koneksi.php');

// Get data dari form
$id_absensi = $_POST['id_absensi'];
$id_staff = $_POST['id_staff'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun']; 
$hadir = $_POST['hadir'];
$tdk_hadir = $_POST['tdk_hadir'];
$sakit = $_POST['sakit'];
$izin = $_POST['izin'];

// Query update data ke dalam database berdasarkan ID
$query = "UPDATE absensi 
          SET id_staff = '$id_staff', 
              bulan = '$bulan', 
              tahun = '$tahun', 
              hadir = '$hadir', 
              tdk_hadir = '$tdk_hadir', 
              sakit = '$sakit', 
              izin = '$izin' 
          WHERE id_absensi = '$id_absensi'";

// Kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($query) === TRUE) {
    // Redirect ke halaman tampil_absensi.php 
    header("location: tampil_absensi.php");
    exit(); // Pastikan untuk menghentikan script setelah redirect
} else {
    // Pesan error gagal update data
    echo "Data Gagal Diupdate: " . $koneksi->error;
}

?>
