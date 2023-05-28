<?php
// Jika session atau token tidak valid
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Halaman ini tidak dapat diakses jika belum login !!!')</script>";
    header('Location: http://localhost/web-puisi'); // Arahkan ke halaman login
    exit(); // Hentikan eksekusi script
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM puisi WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

$genreResult = mysqli_query($conn, "SELECT * FROM genre");
?>

<div class="container-buat-puisi">
    <h1 class="lable-buat-puisi">Edit Puisi</h1>
    <form action="../../config/controllers/proses_edit_puisi.php" method="post" class="card-buat-puisi">
        <input type="hidden" name="id" class="input-puisi" placeholder="Judul" value="<?= $row['id'] ?>">
        <input type="text" name="judul" class="input-puisi" placeholder="Judul" value="<?= $row['judul'] ?>">
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
        <textarea name="isi" cols="30" rows="10" placeholder="Isi Puisi"><?= $row['isi'] ?></textarea>
        <div class="btn-buat-puisi">
            <a href="?page=home" class=" btn-puisi kembali">Kembali</a>
            <input type="submit" class="btn-puisi upload" value="Edit"></input>
        </div>
    </form>
</div>

<?php include "../../components/footer.php"; ?>