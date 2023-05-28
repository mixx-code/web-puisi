<?php
// Memulai session
session_start();

// Mengambil koneksi ke database
include "../../config/db/koneksi.php";

// Mengambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_user = intval($_SESSION['user_id']); // Username penerbit diambil dari session

    // Membuat query insert data
    $query = "INSERT INTO profil_penerbit (nama, umur, alamat, email, no_telp, tanggal_lahir, jenis_kelamin, id_user) VALUES ('$nama', '$umur', '$alamat', '$email', '$no_telp', '$tanggal_lahir', '$jenis_kelamin', '$id_user')";

    // Menjalankan query
    $result = mysqli_query($conn, $query);

    // Mengecek apakah query berhasil dijalankan atau tidak
    if ($result) {
        // Redirect ke halaman utama jika berhasil
        echo "<script>alert('Berhasil mengupload profil')</script>";
        echo "<meta http-equiv='refresh' content='0; url= ../../pages/main_layout/index.php'>";
        exit();
    } else {
        // Menampilkan pesan error jika query gagal dijalankan
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Menutup koneksi ke database
}
mysqli_close($conn);
