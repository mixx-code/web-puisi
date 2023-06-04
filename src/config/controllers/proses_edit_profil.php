<!-- <?php
        // mengambil koneksi ke database
        include "../../config/db/koneksi.php";

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            // mengambil data dari form
            $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = $_POST['nama'];
                $umur = $_POST['umur'];
                $alamat = $_POST['alamat'];
                $email = $_POST['email'];
                $no_telp = $_POST['no_telp'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $jenis_kelamin = $_POST['jenis_kelamin'];

                // membuat query update data dengan prepared statement
                $query = "UPDATE profil_penerbit SET nama = ?, umur = ?, alamat = ?, email = ?, no_telp = ?, tanggal_lahir = ?, jenis_kelamin = ? WHERE id_user = ?";
                $stmt = mysqli_prepare($conn, $query);

                // bind parameter ke statement
                mysqli_stmt_bind_param($stmt, "sisssssi", $nama, $umur, $alamat, $email, $no_telp, $tanggal_lahir, $jenis_kelamin, $id_user);

                // jalankan statement
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    // redirect ke halaman utama jika berhasil
                    echo "<script type='text/javascript'>alert('Berhasil Diupdate')</script>";
                    echo "<meta http-equiv='refresh' content='0; url= ../../pages/main_layout/index.php'>";
                    // header('location: ../../pages/main_layout/index.php');
                } else {
                    // tampilkan pesan error jika query gagal dijalankan
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }

                // menutup statement
                mysqli_stmt_close($stmt);
            }
        }

        // menutup koneksi ke database
        mysqli_close($conn);
        ?> -->
<?php
// mengambil koneksi ke database
include "../../config/db/koneksi.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // mengambil data dari form
    // $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $no_telp = $_POST['no_telp'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $id_user = $_POST['id_user'];
        // membuat query update data
        $query = "UPDATE profil_penerbit SET nama = '$nama', umur = '$umur', alamat = '$alamat', email = '$email', no_telp = '$no_telp', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin' WHERE id_user = '$id_user'";

        // jalankan query
        $result = mysqli_query($conn, $query);

        if ($result) {
            // redirect ke halaman utama jika berhasil
            echo "<script type='text/javascript'>alert('Berhasil Diupdate')</script>";
            echo "<meta http-equiv='refresh' content='0; url= ../../pages/main_layout/index.php'>";
        } else {
            // tampilkan pesan error jika query gagal dijalankan
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

// menutup koneksi ke database
mysqli_close($conn);
?>