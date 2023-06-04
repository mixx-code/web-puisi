<div class="card-puisi">
    <a href="?page=detail&id=<?php echo $row['id']; ?>">
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
        <p class="title-penulis"><?php echo $row["judul"] ?> - <?php echo $row["genre"] ?></p>
        <p class="tanggal"><?php echo $row["tanggal_post"] ?></p>
        <?php if ($page == "puisi_anda") : ?>
            <a href="?page=edit_puisi&id=<?= $row['id']; ?>" class="edit"><i class="fa-solid fa-pen-to-square fa-lg"></i></i></a>
            <a href="../../config/controllers/proses_delete_puisi.php?id=<?= $row['id']; ?>" class="delete" onclick="return confirm('Apa anda mau menghapus puisi ini ? ')"><i class="fa-solid fa-trash fa-lg"></i></a>
        <?php endif; ?>
    </a>
</div>