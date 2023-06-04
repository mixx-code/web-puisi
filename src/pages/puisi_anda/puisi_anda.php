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
        <h2>Jumlah pusis anda : <?= $total['total_puisi'] > 0 ? $total['total_puisi'] : '0' ?></h2>
        <div class="wrapp">
            <?php
            // jumlah data per halaman
            $jumlahDataPerHalaman = 10;
            //jumlah data pada puisi
            $sql = "SELECT COUNT(*) AS jumlah FROM puisi";
            $jumlahData = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            // menghitung jumlah halaman
            $jumlahHalaman = ceil($jumlahData['jumlah'] / $jumlahDataPerHalaman);
            // mengambil halaman yang diminta
            $halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
            $awalData = ($halamanAktif - 1) * $jumlahDataPerHalaman;
            // mengambil data puisi dari tabel puisi
            $puisi = "SELECT puisi.id, puisi.judul, puisi.id_genre, puisi.isi, puisi.tanggal_post, genre.id_genre, genre.genre FROM puisi JOIN genre ON genre.id_genre = puisi.id_genre WHERE id_user = '$user_id' ORDER BY puisi.tanggal_post DESC LIMIT $awalData, $jumlahDataPerHalaman";
            // $sql = "SELECT * FROM puisi ORDER BY tanggal_post DESC";
            $result = mysqli_query($conn, $puisi);
            ?>
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                    <?php include "../../components/card_puisi.php"; ?>

                <?php endwhile; ?>
            <?php else : ?>
                <p>Belum ada puisi yang tersedia</p>
            <?php endif; ?>
        </div>
        <div class="pagination">
            <?php if ($halamanAktif > 1) : ?>
                <a class="btn sebelumnya" href="?page=puisi_anda&halaman=<?= $halamanAktif - 1 ?>">Sebelumnya</a>
            <?php else : ?>
                <span class="btn sebelumnya" hidden>Sebelumnya</span>
            <?php endif; ?>

            <!-- <h3><?= $halamanAktif ?></h3> -->

            <?php if ($halamanAktif <= 0) : ?>
                <a class="btn selanjutnya" href="?page=puisi_anda&halaman=<?= $halamanAktif + 1 ?>">Selanjutnya</a>
            <?php else : ?>
                <span class="btn selanjutnya" hidden>Selanjutnya</span>
            <?php endif; ?>
        </div>
    </div>
</div>