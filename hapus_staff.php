<?php 
session_start(); // Mulai session
include 'koneksi.php';

// Cek jika pengguna mengonfirmasi penghapusan
if (isset($_POST['confirm'])) {
    $id_staff = $_SESSION['id_staff'];

    // Proses penghapusan
    $query = "DELETE FROM staff WHERE id_staff = '$id_staff'";
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['message'] = "Data staff berhasil dihapus.";
    } else {
        $_SESSION['message'] = "Gagal menghapus data staff: " . mysqli_error($koneksi);
    }
    unset($_SESSION['id_staff']); // Hapus ID dari session setelah proses
    header('Location: tampil_staff.php'); // Redirect kembali ke halaman tampil staff
    exit;
}

// Menangkap data id yang dikirim dari URL
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id_staff'] = $id; // Simpan ID staff ke dalam session
    header('Location: tampil_staff.php?action=confirm_delete'); // Redirect ke halaman tampil staff untuk menampilkan pesan konfirmasi
    exit;
}
?>
