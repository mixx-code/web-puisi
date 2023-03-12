<?php
// Panggil file koneksi ke database
include "../../config/db/koneksi.php";

// Tangkap data dari form registrasi
$username = $_POST['username'];
$nama_lengkap = $_POST['nama_lengkap'];
$password = $_POST['password'];
$konfirmasi_password = $_POST['konfirmasi_password'];

// Cek apakah password sama dengan konfirmasi password
if ($password != $konfirmasi_password) {
    // Jika tidak sama, tampilkan pesan kesalahan dan redirect kembali ke halaman registrasi
    echo "<script>alert('Konfirmasi password tidak sesuai.');</script>";
    echo "<meta http-equiv='refresh' content='0; url= ../../pages/registrasi/index.php'>";
    exit();
}

// Enkripsi password menggunakan fungsi password_hash()
$password = password_hash($password, PASSWORD_DEFAULT);

// Query untuk memeriksa apakah username sudah ada di database
$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$cek = mysqli_num_rows($query);

// Jika username sudah ada di database, tampilkan pesan kesalahan dan redirect kembali ke halaman registrasi
if ($cek > 0) {
    echo "<script>alert('Username sudah digunakan.');</script>";
    echo "<meta http-equiv='refresh' content='0; url= ../../pages/registrasi/index.php'>";
    exit();
}

// Query untuk menyimpan data registrasi ke database
$query = mysqli_query($conn, "INSERT INTO user (username, nama_lengkap, password) VALUES ('$username', '$nama_lengkap', '$password')");

// Jika query berhasil dijalankan, tampilkan pesan sukses dan redirect ke halaman login
if ($query) {
    echo "<script>alert('Registrasi berhasil. Silahkan login.');</script>";
    echo "<meta http-equiv='refresh' content='0; url= ../../pages/login/index.php'>";
    exit();
} else {
    // Jika query gagal dijalankan, tampilkan pesan kesalahan
    echo "<script>alert('Registrasi gagal. Silahkan coba lagi.');</script>";
    echo "<meta http-equiv='refresh' content='0; url=../../pages/registrasi/index.php'>";
    exit();
}
