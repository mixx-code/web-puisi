<?php
$id_user = $_SESSION['user_id'];
?>

<div class="container-buat-puisi">
    <h1 class="lable-buat-puisi">Isi Data Profil</h1>
    <form action="../../config/controllers/proses_isi_profil.php" enctype="multipart/form-data" method="post" class="card-buat-puisi">
        <input type="file" name="foto_profil" id="" class="input-puisi">
        <input type="text" name="nama" id="" class="input-puisi" placeholder="Masukkan Nama anda">
        <input type="number" name="umur" id="" class="input-puisi" placeholder="Masukkan Umur anda">
        <textarea name="alamat" id="" cols="30" rows="10" placeholder="Masukkan Alamat anda"></textarea>
        <input type="email" name="email" id="" class="input-puisi" placeholder="Masukkan Email anda">
        <input type="tel" name="no_telp" id="" class="input-puisi" placeholder="masukkan no telpon anda">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="" class="input-puisi" placeholder="Masukkan Tanggal lahir anda">
        <input type="text" name="jenis_kelamin" id="" class="input-puisi" placeholder="Masukkan Jenis Kelamin anda">
        <div class="btn-buat-puisi">
            <a href="?page=profil&id_user=<?= $id_user ?>" class=" btn-puisi kembali">Kembali</a>
            <button type="submit" class="btn-puisi upload">Submit</button>
        </div>
    </form>
</div>