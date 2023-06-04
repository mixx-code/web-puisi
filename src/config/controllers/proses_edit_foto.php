<?php
// mengambil koneksi ke database
include "../../config/db/koneksi.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // mengambil data dari form
    // $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_user = $_POST['id_user'];
        if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] === UPLOAD_ERR_OK) {
            $nama_file = $_FILES["foto_profil"]["name"];
            $tipe_file = $_FILES["foto_profil"]["type"];
            $ukuran_file = $_FILES["foto_profil"]["size"];
            $tmp_file = $_FILES["foto_profil"]["tmp_name"];

            // Baca file gambar
            $fp = fopen($tmp_file, 'r');
            $foto_profil = fread($fp, filesize($tmp_file));
            $foto_profil = mysqli_real_escape_string($conn, $foto_profil);
            fclose($fp);
        } else {
            // File gambar tidak diunggah atau terjadi kesalahan saat unggah
            $foto_profil = null;
        }
        // membuat query update data
        $query = "UPDATE profil_penerbit SET foto_profil = '$foto_profil' WHERE id_user = '$id_user'";

        // jalankan query
        $result = mysqli_query($conn, $query);

        if ($result) {
            // redirect ke halaman utama jika berhasil
            echo "<script type='text/javascript'>alert('Berhasil Diupdate')</script>";
            echo "<meta http-equiv='refresh' content='0; url= ../../pages/main_layout/index.php'>";
        } else {
            // tampilkan pesan error jika query gagal dijalankan
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

// menutup koneksi ke database
mysqli_close($conn);
