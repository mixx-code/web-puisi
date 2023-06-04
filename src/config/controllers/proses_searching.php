<?php
include "../../config/db/koneksi.php";

if (isset($_GET['kata_kunci'])) {
    $kata_kunci = $_GET['kata_kunci'];

    // Query untuk melakukan pencarian berdasarkan judul puisi
    $puisi_query = "SELECT puisi.id, puisi.judul, puisi.id_genre, puisi.isi, puisi.tanggal_post, genre.id_genre, genre.genre FROM puisi JOIN genre ON genre.id_genre = puisi.id_genre WHERE puisi.judul LIKE '%$kata_kunci%' ORDER BY puisi.tanggal_post DESC";
    $result = mysqli_query($conn, $puisi_query);

    // Redirect ke halaman hasil pencarian dan mengirim hasil query sebagai parameter URL
    header("Location: ../../pages/main_layout/?page=searching&hasil=" . urlencode($puisi_query));
    exit();
}
