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
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["nama_lengkap"] = $row["nama_lengkap"];

            // redirect ke halaman utama setelah login
            header("Location: ../../pages/main_layout/index.php");
            exit();
        } else {
            // jika password tidak cocok
            header("Location: ../../pages/login/index.php");
        }
    } else {
        // jika username tidak ditemukan
        echo "<script>alert('username atau password salah !!!')</script>";
        header("Location: ../../pages/login/index.php");
    }
}
