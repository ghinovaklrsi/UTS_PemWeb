<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id_staff = $_POST['id_staff'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$jabatan = $_POST['jabatan'];

// Query update data ke dalam database berdasarkan ID
$query = "UPDATE staff SET 
            nama = '$nama', 
            tgl_lahir = '$tgl_lahir', 
            alamat = '$alamat', 
            no_telp = '$no_telp', 
            email = '$email', 
            gender = '$gender', 
            jabatan = '$jabatan' 
          WHERE id_staff = '$id_staff'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampil_staff.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>