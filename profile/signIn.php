<?php
    session_start();
    if (isset($_SESSION['user'])){
        header("Location: ../content/start_pg.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic-Tak-Toe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/main.css">
    <script src="../scripts/dropMenu.js"></script>
</head>
<body>
    <header>
        <a href="../index.php"><img src="../assets/logo.svg" alt="logo"></a>
        <div class="drop_menu">
            <button onclick="dropMenu()" class="dropbtn">профиль</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="signIn.php">Вход</a>
                <a href="signUp.php">Регистрация</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="container" style="height: 300px">
            <?php
            if (isset($_SESSION['message'])){
                echo '<p class="err">'.$_SESSION['message'].'</p>';
                unset($_SESSION['message']);
            }
            ?>
            <form method="post" action="../php/login.php" style="height: 250px;">
                <div class="prof_inp">
                    <label>Логин</label>
                    <input type="text" name="login" placeholder="Введите логин">
                </div>
                <div class="prof_inp">
                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль">
                </div>
                <button type="submit" class="main_btn prof_btn">Войти</button>
            </form>
            <p class="call">Нет аккаунта? – <a href="signUp.php">регистрация</a></p>
        </div>
    </div>
</body>
</html>