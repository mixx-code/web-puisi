<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../../../assets/fontawesome/css/regular.css">
    <link rel="stylesheet" href="../../../assets/fontawesome/css/solid.css">
    <link rel="stylesheet" href="../../../assets/css/login.css">
    <link rel="shortcut icon" href="../../../assets/icon/otaku.png" type="image/x-icon">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="kotak1">
            <div class="switch">

                <a href="../login" class="link-login">Login</a>
                <a href="../registrasi" class="link-registrasi">Registrasi</a>
            </div>
        </div>
        <div class="kotak2">
            <div class="title">Login Page</div>
            <form action="../../config/controllers/proses_login.php" method="POST">
                <div class="username">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="input-user" placeholder="Username" name="username" maxlength="50" required>
                </div>
                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" class="input-password" placeholder="Password" name="password" maxlength="8" required>
                </div>
                <div class="btn">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>