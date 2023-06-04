<?php
include "../../config/db/koneksi.php"; // file koneksi ke database


$id = $_GET['id'];
$sql = "SELECT puisi.id, puisi.judul, puisi.id_genre, puisi.isi, puisi.tanggal_post, genre.id_genre, genre.genre, user.username FROM puisi JOIN genre ON genre.id_genre = puisi.id_genre JOIN user ON user.id_user = puisi.id_user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$tanggal = $row['tanggal_post'];
$nama_hari = date('l', strtotime($tanggal));
?>
<div class="container-detail-puisi">
    <div class="content-detail-puisi">
        <h1><?php echo $row['judul']; ?></h1>
        <h3 class="genre">Penulis : <?php echo $row['username']; ?></h3>
        <p class="genre">Genre : <?php echo $row['genre']; ?></p>
        <p class="detail-isi"><?php echo nl2br($row['isi']); ?></p>
        <p><?php echo $nama_hari . ', ' . $tanggal; ?></p>
    </div>
</div>