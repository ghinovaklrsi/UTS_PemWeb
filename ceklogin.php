<?php 
session_start();
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data pada tabel admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $row = mysqli_fetch_assoc($data); // Ambil data pengguna
    $_SESSION['id_user'] = $row['id_user']; // Simpan id_user di session
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:dashboard.php");
}
else {
    echo "<script> alert ('Login Gagal! Username dan Password Salah.');</script>";
    echo "<script> window.location ='login.php';</script>";
}
?>
