<!-- <a href="../create_puisi/create_puisi.php">Create New Puisi</a> -->
<?php

// Jika session atau token tidak valid
if (!isset($_SESSION['username'])) {
    echo "<script>alert('halaman ini tidak dapat diakses jika belum login !!!')</script>";
    header('Location: http://localhost/web-puisi'); // Arahkan ke halaman login
    die(); // Hentikan eksekusi script
}
$user_id = $_SESSION['user_id'];
?>

<div class="container-home">
    <?php include "../../components/welcome.php" ?>


    <div class="content">
        <?php
        // mengambil data puisi dari tabel puisi
        $total_puisi = mysqli_query($conn, "SELECT COUNT(*) AS total_puisi FROM puisi where id_user ='$user_id'");
        $total = mysqli_fetch_assoc($total_puisi);
        ?>
        <h2>Pusis anda : <?= $total['total_puisi'] > 0 ? $total['total_puisi'] : '0' ?></h2>
        <div class="wrapp">
            <?php
            $sql = "SELECT * FROM puisi where id_user ='$user_id'";
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