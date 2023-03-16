<?php
include_once "../db/koneksi.php"; // file koneksi ke database

// cek apakah parameter id ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // query untuk menghapus data puisi berdasarkan id
    $sql = "DELETE FROM puisi WHERE puisi.id = $id";
    
    // menjalankan query
    if (mysqli_query($conn, $sql)) {
        // jika berhasil menghapus, redirect ke halaman utama
        header("Location: ../../pages/main_layout/?page=puisi_anda.php");
        exit();
    } else {
        // jika gagal, tampilkan pesan error
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// tutup koneksi
mysqli_close($conn);
?>
