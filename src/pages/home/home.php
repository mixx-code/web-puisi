<!-- <a href="../create_puisi/create_puisi.php">Create New Puisi</a> -->

<div class="container-home">
    <?php include "../../components/welcome.php" ?>

    <div class="content">
        <h2>Pusis untuk anda</h2>
        <div class="wrapp">
            <?php
            include "../../config/db/koneksi.php"; // file koneksi ke database
            // mengambil data puisi dari tabel puisi
            $sql = "SELECT * FROM puisi ORDER BY tanggal_post DESC";
            $result = mysqli_query($conn, $sql);
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
            <a class="btn sebelumnya" href="#">Sebelumnya</a>
            <a class="btn selanjutnya" href="#">Selanjutnta</a>
        </div>
    </div>
</div>