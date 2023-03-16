<?php
if ($pg == "puisi_anda") : ?>
    <div class="card-puisi">
        <a href="?page=detail&id=<?php echo $row['id']; ?>">
            <?php
            $teks = $row['isi'];
            $baris = explode("\n", $teks);
            echo "<p style='color: #7C6868'>";
            for ($i = 0; $i < 6 && $i < count($baris); $i++) {
                echo $baris[$i] . "<br>";  // Tampilkan elemen ke-$i dari array, diikuti tag <br>
            }
            echo "</p>";
            ?>
            <hr style="color: #7C6868">
            <p class="tanggal"><?php echo $row["tanggal_post"] ?></p>
            <p class="title-penulis"><?php echo $row["judul"] ?> - <?php echo $row["penerbit"] ?></p>
        </a>
        <a href="?page=edit_puisi&id=<?= $row['id']; ?>" class="edit"><i class="fa-solid fa-pen-to-square fa-lg"></i></i></a>
        <a href="../../config/controllers/proses_delete_puisi.php?id=<?= $row['id']; ?>" class="delete" onclick="return confirm('Apa anda mau menghapus puisi ini ? ')"><i class="fa-solid fa-trash fa-lg"></i></a>
    </div>
<?php else : ?>
    <a href="?page=detail&id=<?php echo $row['id']; ?>" class="card-puisi">
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
<?php endif; ?>