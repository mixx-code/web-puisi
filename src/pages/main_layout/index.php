<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/fontawesome/css/brands.css">
    <link rel="stylesheet" href="../../../assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../../../assets/fontawesome/css/solid.css">
    <link rel="stylesheet" href="../../../assets/fontawesome/css/regular.css">
    <link rel="stylesheet" href="../../../assets/css/main_layout.css">
    <link rel="stylesheet" href="../../../assets/css/home.css">
    <link rel="stylesheet" href="../create_puisi/create_puisi.css">
    <link rel="stylesheet" href="../../../assets/css/buat_puisi.css">
    <link rel="shortcut icon" href="../../../assets/icon/otaku.png" type="image/x-icon">
    <title>
        <?php
        $pg = $_GET['page'];
        if ($pg == "home") {
            echo "Halaman home";
        } elseif ($pg == "buat_puisi") {
            echo "Halaman buat puisi";
        } elseif ($pg == "puisi_anda") {
            echo "Halaman puisi anda";
        } elseif ($pg == "detail") {
            echo "Halaman detail";
        } elseif ($pg == "main_layout") {
            echo "Halaman home";
        }
        ?>
    </title>
</head>

<body>
    <div class="container">
        <?php
        session_start();

        // cek apakah user sudah login atau belum
        if (isset($_SESSION["username"])) {
            // jika sudah login, tampilkan link logout
            echo "<a href='../../config/controller/proses_logout.php'>Logout</a>";
        } else {
            // jika belum login, tampilkan link login
            echo "<a href='../login'>Login</a>";
        }
        ?>
        <a href="#">link 2</a>
        <a href="#">link 3</a>
    </div>
    </div>
    </nav>
    <nav>
        <h1 class="logo"><a href="?page=home" style="color: black;"> Tugas Besar</a></h1>
        <input type="text" class="search" placeholder="Search" maxlength="50">
        <div class="card-profile">
            <div class="bulet"></div>
            <?php if (isset($_SESSION["username"])) {
                echo '<p>' . $_SESSION["username"] . '</p>';
            } else {
                echo "<p>Login</p>";
            } ?>
            <!-- <p>Login</p> -->
            <span>∇</span>
            <div class="dropdown hidden">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<a href='#'>Profile</a>"; //buka
                    echo "<hr>";
                    echo "<a href='?page=buat_puisi'>Buat Puisi</a>";
                    echo "<a href='?page=puisi_anda'>Lihat Puisi Anda</a>";
                    echo "<hr>";
                    echo "<a href='../../config/controllers/proses_logout.php'>Logout</a>";
                } else {
                    echo "<a href='../login'>Login</a>"; //buka
                    echo "<hr>";
                    echo "<a href='../registrasi/index.php'>Registrasi</a>";
                }
                ?>

            </div>
        </div>
    </nav>
    <div class="kotak2">
        <?php
        @$page = $_GET['page'];
        if (!empty($page)) {
            switch ($page) {
                case 'home':
                    include '../home/home.php';
                    break;
                case 'buat_puisi':
                    include '../buat_puisi/buat_puisi.php';
                    break;
                case 'puisi_anda':
                    include '../puisi_anda/puisi_anda.php';
                    break;
                case 'detail':
                    include '../detail/detail_puisi.php';
                    break;
                default:
                    include '../home/home.php';
                    break;
            }
        } else {
            include '../home/home.php';
        }



        ?>
    </div>

    </div>
    <script>
        const cardProfile = document.querySelector(".card-profile");
        const dropdown = document.querySelector(".dropdown");

        cardProfile.addEventListener("click", () => {
            // Cek apakah elemen 'myDiv' ditampilkan atau disembunyikan
            if (dropdown.classList.contains("hidden")) {
                // Menghapus kelas 'hidden' dari elemen 'div'
                dropdown.classList.remove("hidden");
            } else {
                // Menambahkan kelas 'hidden' kembali ke elemen 'dropdown' jika sudah ditampilkan sebelumnya
                dropdown.classList.add("hidden");
            }
        });
    </script>
</body>

</html>