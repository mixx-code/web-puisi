    <?php include "../../components/header.php"; ?>
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