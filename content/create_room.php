<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header("Location: ../index.php");
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
        <a href="start_pg.php"><img src="../assets/logo.svg" alt="logo"></a>
        <div class="drop_menu">
            <button onclick="dropMenu()" class="dropbtn">профиль</button>
            <div id="myDropdown" class="dropdown-content">
                <p style="font-weight: 900;"><?= $_SESSION['user'] ?></p>
                <a href="#">Статистика</a>
                <a href="../php/logout.php">Выход</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="container" style="height: 500px;">
            <button class="main_btn">Создать комнату</button>
            <div class="rules">
                <h4>ПРАВИЛА</h4>
                <p class="rule_descr">Режим игры</p>
                <div class="rule">
                    3x3
                </div>
                <p class="rule_descr">Время на игрока</p>
                <div class="rule">
                    1 мин.
                </div>
                <p class="rule_descr">Первый ход</p>
                <div class="rule">
                    Произвольно
                </div>
            </div>
        </div>
    </div>
</body>
</html>