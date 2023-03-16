<?php
// mengambil koneksi ke database
include "../../config/db/koneksi.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // mengambil data dari form
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $genre = $_POST['genre'];
        $isi = $_POST['isi'];

        // membuat query update data dengan prepared statement
        $query = "UPDATE puisi SET judul=?, genre=?, isi=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssi', $judul, $genre, $isi, $id);
        $result = mysqli_stmt_execute($stmt);

        // mengecek apakah query berhasil dijalankan atau tidak
        if ($result) {
            // redirect ke halaman utama jika berhasil
            echo "<script type='text/javascript'>alert('Berhasil Diupdate')</script>";
            echo "<meta http-equiv='refresh' content='0; url= ../../pages/main_layout/index.php'>";
            // header('location: ../../pages/main_layout/index.php');
        } else {
            // tampilkan pesan error jika query gagal dijalankan
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

// menutup koneksi ke database
mysqli_close($conn);
