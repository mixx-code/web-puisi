<?php
include "../../config/db/koneksi.php"; // file koneksi ke database

$id = $_GET['id'];
$sql = "SELECT * FROM puisi WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<h1><?php echo $row['judul']; ?></h1>
<p><?php echo $row['tanggal_post']; ?></p>
<p><?php echo nl2br($row['isi']); ?></p>