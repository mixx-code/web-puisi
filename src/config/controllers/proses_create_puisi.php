<?php
// memulai session
session_start();

// mengambil koneksi ke database
include "../../config/db/koneksi.php";

// mengambil data dari form
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$isi = $_POST['isi'];
$id_user = $_SESSION['user_id']; // username penerbit diambil dari session

// membuat query insert data
$query = "INSERT INTO puisi (judul, id_genre, isi, id_user) VALUES ('$judul', '$genre', '$isi', '$id_user')";

// menjalankan query
$result = mysqli_query($conn, $query);

// mengecek apakah query berhasil dijalankan atau tidak
if ($result) {
    // redirect ke halaman utama jika berhasil
    echo "<script>alert('Puisi berhasil diupload')</script>";
    echo "<meta http-equiv='refresh' content='0; url= ../../pages/main_layout/index.php'>";
} else {
    // tampilkan pesan error jika query gagal dijalankan
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// menutup koneksi ke database
mysqli_close($conn);
