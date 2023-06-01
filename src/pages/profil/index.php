<?php
$id_user = $_GET['id_user'];
$data_profil = mysqli_query($conn, "SELECT * FROM profil_penerbit WHERE id_user = '$id_user'");
$data = mysqli_fetch_assoc($data_profil);
?>

<div class="profil">
    <div class="foto-profil">
        <?php
        echo '<img src="data:image/jpeg;base64,' . base64_encode($data['foto_profil']) . '"/>';
        ?>
    </div>
    <div class="data-profil">
        <div class="edit-profil">
            <h1>DATA DIRI</h1>
            <?php
            $row = mysqli_num_rows($data_profil);
            ?>
            <?php if ($row > 0) : ?>
                <a href="?page=edit-profil&id_user=<?= $data['id_user'] ?>">Edit</a>
            <?php else : ?>
                <a href="?page=isi-profil">Isi Profil</a>
            <?php endif ?>
        </div>
        <?php if ($row > 0) : ?>
            <div class="data">
                <h3>Nama</h3>
                <p><?= $data['nama'] ?></p>
            </div>
            <div class="data">
                <h3>Umur</h3>
                <p><?= $data['umur'] ?></p>
            </div>
            <div class="data">
                <h3>Alamat</h3>
                <p><?= $data['alamat'] ?></p>
            </div>
            <div class="data">
                <h3>Email</h3>
                <p><?= $data['email'] ?></p>
            </div>
            <div class="data">
                <h3>No telp</h3>
                <p><?= $data['no_telp'] ?></p>
            </div>
            <div class="data">
                <h3>Tanggal Lahir</h3>
                <p><?= $data['tanggal_lahir'] ?></p>
            </div>
            <div class="data">
                <h3>Jenis Kelamin</h3>
                <p><?= $data['jenis_kelamin'] ?>i</p>
            </div>
        <?php else : ?>
            <div class="data">
                <h3>Nama</h3>
                <p>belum di isi</p>
            </div>
            <div class="data">
                <h3>Umur</h3>
                <p>belum di isi</p>
            </div>
            <div class="data">
                <h3>Alamat</h3>
                <p>belum di isi</p>
            </div>
            <div class="data">
                <h3>Email</h3>
                <p>belum di isi</p>
            </div>
            <div class="data">
                <h3>No telp</h3>
                <p>belum di isi</p>
            </div>
            <div class="data">
                <h3>Tanggal Lahir</h3>
                <p>belum di isi</p>
            </div>
            <div class="data">
                <h3>Jenis Kelamin</h3>
                <p>belum di isi</p>
            </div>
        <?php endif ?>
    </div>
</div>