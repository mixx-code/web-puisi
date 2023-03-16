    <div class="welcome">
        <?php
        if (isset($_SESSION["username"])) {
            $user_login = $_SESSION["username"];
            if ($pg == "puisi_anda") {
                echo '<h1>Puisi, ' . $user_login . '!</h1>';
            } else {
                echo '<h1>Welcome home, ' . $user_login . '!</h1>';
                echo "<hr>
        <h1>Semoga harimu menyenangkan💕</h1>";
            }
        } else {
            echo "<h1>Welcome home, Teman!</h1>";
        } ?>
        <hr>
    </div>