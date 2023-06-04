<!-- <a href="../create_puisi/create_puisi.php">Create New Puisi</a> -->

<div class="container-home">
    <?php include "../../components/welcome.php" ?>

    <div class="content">
        <h2>Pusis untuk anda</h2>
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
            $puisi = "SELECT puisi.id, puisi.judul, puisi.id_genre, puisi.isi, puisi.tanggal_post, genre.id_genre, genre.genre FROM puisi JOIN genre ON genre.id_genre = puisi.id_genre ORDER BY puisi.tanggal_post DESC LIMIT $awalData, $jumlahDataPerHalaman";
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
                <a class="btn sebelumnya" href="?page=home&halaman=<?= $halamanAktif - 1 ?>">Sebelumnya</a>
            <?php else : ?>
                <span class="btn sebelumnya" hidden>Sebelumnya</span>
            <?php endif; ?>

            <!-- <h3><?= $halamanAktif ?></h3> -->

            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                <a class="btn selanjutnya" href="?page=home&halaman=<?= $halamanAktif + 1 ?>">Selanjutnya</a>
            <?php else : ?>
                <span class="btn selanjutnya" hidden>Selanjutnya</span>
            <?php endif; ?>
            <!-- <a class="btn sebelumnya" href="#">Sebelumnya</a>
            <a class="btn selanjutnya" href="#">Selanjutnta</a> -->
        </div>
    </div>
</div>