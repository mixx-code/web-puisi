<?php

// Jika session atau token tidak valid
if (!isset($_SESSION['username'])) {
    echo "<script>alert('halaman ini tidak dapat diakses jika belum login !!!')</script>";
    header('Location: http://localhost/web-puisi'); // Arahkan ke halaman login
    die(); // Hentikan eksekusi script
}
$genreResult = mysqli_query($conn, "SELECT * FROM genre");
?>
<div class="container-buat-puisi">
    <h1 class="lable-buat-puisi">Buat Puisi</h1>
    <form action="../../config/controllers/proses_create_puisi.php" method="post" class="card-buat-puisi">
        <input type="text" name="judul" id="" class="input-puisi" placeholder="Judul">
        <select class="input-puisi" name="genre" id="">
            <?php while ($genreRow = mysqli_fetch_assoc($genreResult)) : ?>
                <?php
                $idGenre = $genreRow['id_genre'];
                $namaGenre = $genreRow['genre'];
                $selected = ($idGenre == $row['id_genre']) ? 'selected' : '';
                echo '<option value="' . $idGenre . '" ' . $selected . '>' . $namaGenre . '</option>';
                ?>
            <?php endwhile ?>
        </select>
        <textarea name="isi" id="" cols="30" rows="10" placeholder="Isi Puisi"></textarea>
        <div class="btn-buat-puisi">
            <a href="?page=home" class=" btn-puisi kembali">Kembali</a>
            <button type="submit" class="btn-puisi upload">Upload</button>
        </div>
    </form>
</div>