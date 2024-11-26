<?php

// Include koneksi database
include('koneksi.php');

// Ambil data dari form
$id_gaji = $_POST['id_gaji'];
$id_staff = $_POST['id_staff'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun']; 
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan = $_POST['tunjangan'];
$potongan = $_POST['potongan'];

// Hitung total gaji
$total_gaji = $gaji_pokok + $tunjangan - $potongan;

// Query update data ke dalam database berdasarkan ID
$query = "UPDATE gaji 
          SET id_staff = '$id_staff', 
              bulan = '$bulan', 
              tahun = '$tahun', 
              gaji_pokok = '$gaji_pokok', 
              tunjangan = '$tunjangan', 
              potongan = '$potongan', 
              total_gaji = '$total_gaji' 
          WHERE id_gaji = '$id_gaji'";

// Kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($query)) {
    // Redirect ke halaman tampil_gaji.php 
    header("Location: tampil_gaji.php");
    exit; // Pastikan script berhenti setelah redirect
} else {
    // Pesan error gagal update data
    echo "Data Gagal Diupdate! Error: " . $koneksi->error;
}

?>
