<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir']; 
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$jabatan = $_POST['jabatan'];

// menginput data ke database
mysqli_query($koneksi, "INSERT INTO staff (nama, tgl_lahir, alamat, no_telp, email, gender, jabatan) VALUES ('$nama', '$tgl_lahir', '$alamat', '$no_telp', '$email', '$gender', '$jabatan')");


// mengalihkan halaman kembali ke index.php
header("location:tampil_staff.php");
 
?>