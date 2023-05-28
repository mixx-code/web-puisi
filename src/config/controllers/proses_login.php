<?php
session_start();
include_once "../db/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mengambil data dari form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // mencari data pengguna pada tabel user
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // memverifikasi password
        if (password_verify($password, $row["password"])) {
            // menyimpan informasi login ke session
            $_SESSION["user_id"] = $row["id_user"];
            $_SESSION["username"] = $row["username"];

            // redirect ke halaman utama setelah login
            echo "<script>alert('Selamat datang " . $username . " 🫡')</script>";
            echo "<meta http-equiv='refresh' content='0; url= ../../pages/main_layout/?page=home'>";
            exit();
        } else {
            // jika password tidak cocok
            echo "<script>alert('password salah !!!')</script>";
            echo "<meta http-equiv='refresh' content='0; url= ../../pages/login/index.php'>";
        }
    } else {
        // jika username tidak ditemukan
        echo "<script>alert('username salah !!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url= ../../pages/login/index.php'>";
    }
}
