<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../pages/main_layout/?page=home");
exit();
