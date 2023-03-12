<!-- <a href="../create_puisi/create_puisi.php">Create New Puisi</a> -->

<div class="container-home">
    <div class="welcome">
        <?php if (isset($_SESSION["username"])) {
            echo '<h1>Welcome home, ' . $_SESSION["username"] . '!</h1>';
        } else {
            echo "<h1>Welcome home, Teman!</h1>";
        } ?>
        <hr>
        <h1>Semoga harimu menyenangkan💕</h1>
    </div>

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
                    <a href="../detail/detail_puisi.php?id=<?php echo $row['id']; ?>" class="card-puisi">
                        <?php
                        $teks = $row['isi'];
                        $baris = explode("\n", $teks);
                        echo "<p class='isi'>";
                        for ($i = 0; $i < 6 && $i < count($baris); $i++) {
                            echo $baris[$i] . "<br>";  // Tampilkan elemen ke-$i dari array, diikuti tag <br>
                        }
                        echo "</p>";
                        ?>
                        <hr style="color: #7C6868">
                        <p class="tanggal"><?php echo $row["tanggal_post"] ?></p>
                        <p class="title-penulis"><?php echo $row["judul"] ?> - <?php echo $row["penerbit"] ?></p>
                    </a>
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