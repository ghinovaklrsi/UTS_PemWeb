<?php
// include koneksi database
include 'koneksi.php';

// menangkap data dari form
$id_staff = $_POST['id_staff'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan = $_POST['tunjangan'];
$potongan = $_POST['potongan'];

// Validasi ID Staff
if (empty($id_staff)) {
    echo "ID Staff tidak boleh kosong!";
    exit;
}

// Cek apakah id_staff ada di tabel staff
$result = mysqli_query($koneksi, "SELECT * FROM staff WHERE id_staff='$id_staff'");

if (mysqli_num_rows($result) == 0) {
    echo "ID Staff tidak ditemukan!";
    exit;
}

// hitung total gaji
$total_gaji = $gaji_pokok + $tunjangan - $potongan;

// simpan data ke database
if (mysqli_query($koneksi, "INSERT INTO gaji (id_staff, bulan, tahun, gaji_pokok, tunjangan, potongan, total_gaji) VALUES ('$id_staff', '$bulan', '$tahun', '$gaji_pokok', '$tunjangan', '$potongan', '$total_gaji')")) {
    // redirect ke halaman tampil gaji
    header("location: tampil_gaji.php");
} else {
    // tampilkan error jika insert gagal
    echo "Error: " . mysqli_error($koneksi);
}
?>
