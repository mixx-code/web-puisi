    <?php include "../../components/header.php"; ?>
    <div class="kotak2">
        <?php
        @$page = $_GET['page'];
        if (!empty($page)) {
            @$id = $_GET['id'];
            switch ($page) {
                case 'home':
                    include '../home/home.php';
                    break;
                case 'buat_puisi':
                    include '../buat_puisi/buat_puisi.php';
                    break;
                case 'edit_puisi':
                    include '../edit_puisi/edit_puisi.php';
                    break;
                case 'puisi_anda':
                    include '../puisi_anda/puisi_anda.php';
                    break;
                case 'detail':
                    include '../detail/detail_puisi.php';
                    break;
                case 'profil':
                    include '../profil/index.php';
                    break;
                case 'isi-profil':
                    include '../isi_profil/index.php';
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
    <?php include "../../components/footer.php" ?>