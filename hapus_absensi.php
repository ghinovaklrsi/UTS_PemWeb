<?php 
session_start(); // Mulai session
include 'koneksi.php';

// Cek jika pengguna mengonfirmasi penghapusan
if (isset($_POST['confirm'])) {
    $id_absensi = $_SESSION['id_absensi'];

    // Proses penghapusan
    $query = "DELETE FROM absensi WHERE id_absensi = '$id_absensi'";
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['message'] = "Data absensi berhasil dihapus.";
    } else {
        $_SESSION['message'] = "Gagal menghapus data absensi: " . mysqli_error($koneksi);
    }
    unset($_SESSION['id_absensi']); // Hapus ID dari session setelah proses
    header('Location: tampil_absensi.php'); // Redirect kembali ke halaman tampil staff
    exit;
}

// Menangkap data id yang dikirim dari URL
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id_absensi'] = $id; // Simpan ID staff ke dalam session
    header('Location: tampil_absensi.php?action=confirm_delete'); // Redirect ke halaman tampil staff untuk menampilkan pesan konfirmasi
    exit;
}
?>
