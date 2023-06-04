<div class="container-home">
    <?php include "../../components/welcome.php" ?>

    <div class="content">
        <h2>Hasil Puisi yang dicari</h2>
        <div class="wrapp">
            <?php
            if (isset($_GET['hasil'])) {
                $puisi_query = $_GET['hasil'];

                // Eksekusi query hasil pencarian
                $result = mysqli_query($conn, $puisi_query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        include "../../components/card_puisi.php";
                    }
                } else {
                    echo "<p>Puisi yang dicari tidak ada</p>";
                }
            }
            ?>
        </div>
        <div class="pagination">
            <a class="btn sebelumnya" href="#">Sebelumnya</a>
            <a class="btn selanjutnya" href="#">Selanjutnya</a>
        </div>
    </div>
</div>