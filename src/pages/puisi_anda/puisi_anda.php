<!-- <a href="../create_puisi/create_puisi.php">Create New Puisi</a> -->
<?php

// Jika session atau token tidak valid
if (!isset($_SESSION['username'])) {
    echo "<script>alert('halaman ini tidak dapat diakses jika belum login !!!')</script>";
    header('Location: http://localhost/web-puisi'); // Arahkan ke halaman login
    die(); // Hentikan eksekusi script
}
?>

<div class="container-home">
    <?php include "../../components/welcome.php" ?>


    <div class="content">
        <h2>Pusis anda</h2>
        <div class="wrapp">
            <?php
            include "../../config/db/koneksi.php"; // file koneksi ke database

            // mengambil data puisi dari tabel puisi
            $sql = "SELECT * FROM puisi where penerbit ='$user_login'";
            $result = mysqli_query($conn, $sql);
            $cek_puisi = "SELECT IFNULL(isi, '') AS isi FROM puisi";

            ?>
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <?php include "../../components/card_puisi.php"; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Anda belum membuat puisi</p>
            <?php endif; ?>
        </div>
        <div class="pagination">
            <a class="btn sebelumnya" href="#">Sebelumnya</a>
            <a class="btn selanjutnya" href="">Selanjutnta</a>
        </div>
    </div>
</div>