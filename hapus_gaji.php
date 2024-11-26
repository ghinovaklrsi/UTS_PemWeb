<?php 
session_start(); // Mulai session
include 'koneksi.php';

// Cek jika pengguna mengonfirmasi penghapusan
if (isset($_POST['confirm'])) {
    $id_gaji = $_SESSION['id_gaji'];

    // Proses penghapusan
    $query = "DELETE FROM gaji WHERE id_gaji = '$id_gaji'";
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['message'] = "Data gaji berhasil dihapus.";
    } else {
        $_SESSION['message'] = "Gagal menghapus data gaji: " . mysqli_error($koneksi);
    }
    unset($_SESSION['id_gaji']); // Hapus ID dari session setelah proses
    header('Location: tampil_gaji.php'); // Redirect kembali ke halaman tampil staff
    exit;
}

// Menangkap data id yang dikirim dari URL
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id_gaji'] = $id; // Simpan ID staff ke dalam session
    header('Location: tampil_gaji.php?action=confirm_delete'); // Redirect ke halaman tampil staff untuk menampilkan pesan konfirmasi
    exit;
}
?>
