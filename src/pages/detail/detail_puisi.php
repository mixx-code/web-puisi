<?php
include "../../config/db/koneksi.php"; // file koneksi ke database
include "../../components/header.php";


$id = $_GET['id'];
$sql = "SELECT * FROM puisi WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container-detail-puisi">
    <div class="content-detail-puisi">
        <h1><?php echo $row['judul']; ?></h1>
        <p><?php echo $row['tanggal_post']; ?></p>
        <p><?php echo nl2br($row['isi']); ?></p>
    </div>
</div>