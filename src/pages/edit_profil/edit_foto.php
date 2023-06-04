<?php
$data_profil = mysqli_query($conn, "SELECT * FROM profil_penerbit WHERE id_user = '$id_user'");
$data = mysqli_fetch_assoc($data_profil);
?>

<div class="container-buat-puisi">
    <h1 class="lable-buat-puisi">Edit Data Profil</h1>
    <form action="../../config/controllers/proses_edit_foto.php" enctype="multipart/form-data" method="post" class="card-buat-puisi">
        <?php
        echo '<lable style="margin-left:20px;">Foto sekarang</lable>';
        echo '<img style="margin-left:20px; margin-bottom:20px ;width:100px; height:100px;" src="data:image/jpeg;base64,' . base64_encode($data['foto_profil']) . '"/>';
        ?>
        <input type="text" name="id_user" id="" class="input-puisi" placeholder="Masukkan Nama anda" value="<?= $_GET['id_user'] ?>" readonly hidden>
        <input type="file" name="foto_profil" id="" class="input-puisi">
        <div class="btn-buat-puisi">
            <a href="?page=profil&id_user=<?= $id_user ?>" class=" btn-puisi kembali">Kembali</a>
            <button type="submit" class="btn-puisi upload">Submit</button>
        </div>
    </form>
</div>