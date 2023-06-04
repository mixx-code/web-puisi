<?php
$data_profil = mysqli_query($conn, "SELECT * FROM profil_penerbit WHERE id_user = '$id_user'");
$data = mysqli_fetch_assoc($data_profil);
?>

<div class="container-buat-puisi">
    <h1 class="lable-buat-puisi">Edit Data Profil</h1>
    <form action="../../config/controllers/proses_edit_profil.php" method="post" class="card-buat-puisi">
        <input type="text" name="id_user" id="" class="input-puisi" placeholder="Masukkan Nama anda" value="<?= $_GET['id_user'] ?>" readonly hidden>
        <input type="text" name="nama" id="" class="input-puisi" placeholder="Masukkan Nama anda" value="<?= $data['nama'] ?>">
        <input type="number" name="umur" id="" class="input-puisi" placeholder="Masukkan Umur anda" value="<?= $data['umur'] ?>">
        <textarea name="alamat" id="" cols="30" rows="10" placeholder="Masukkan Alamat anda"><?= $data['alamat'] ?></textarea>
        <input type="email" name="email" id="" class="input-puisi" placeholder="Masukkan Email anda" value="<?= $data['email'] ?>">
        <input type="tel" name="no_telp" id="" class="input-puisi" placeholder="masukkan no telpon anda" value="<?= $data['no_telp'] ?>">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="" class="input-puisi" placeholder="Masukkan Tanggal lahir anda" value="<?= $data['tanggal_lahir'] ?>">
        <input type="text" name="jenis_kelamin" id="" class="input-puisi" placeholder="Masukkan Jenis Kelamin anda" value="<?= $data['jenis_kelamin'] ?>">
        <div class="btn-buat-puisi">
            <a href="?page=profil&id_user=<?= $id_user ?>" class=" btn-puisi kembali">Kembali</a>
            <button type="submit" class="btn-puisi upload">Submit</button>
        </div>
    </form>
</div>