<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header("Location: start_pg.php");
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
                <a href="stat.php">Статистика</a>
                <a href="../php/logout.php">Выход</a>
            </div>
        </div>
    </header>
    <div class="content" style="justify-content: flex-start;">
        <div class="container" style="height: 200px; flex-direction: row; justify-content: center;">
            <div class="game_info" style="color: #B44444; justify-content: flex-start;">
                <div class="counter">0</div>
                <div class="info_cont">
                    <div class="info_name">Playesdfweffdsfs</div>
                    <div class="info_time">0:23</div>
                </div>
            </div>
            <div class="game_info" style="color: #44B4A0; justify-content: flex-end;">
                <div class="info_cont" style="align-items: flex-end;">
                    <div class="info_name">Playesdfweffdsfs</div>
                    <div class="info_time">0:11</div>
                </div>
                <div class="counter">1</div>
            </div>
        </div>
        <div class="field" style="margin-top: 40px;">
            <div class="field-horizon">
                <div class="field_block-1"><img src="../assets/tic.svg" class="TicTac-ico"></div>
                <div class="field_block-2"></div>
                <div class="field_block-3"></div>
            </div>
            <div class="field-horizon">
                <div class="field_block-4"></div>
                <div class="field_block-5"><img src="../assets/tac.svg" class="TicTac-ico"></div>
                <div class="field_block-6"></div>
            </div>
            <div class="field-horizon">
                <div class="field_block-7"></div>
                <div class="field_block-8"><img src="../assets/tic.svg" class="TicTac-ico"></div>
                <div class="field_block-9"><img src="../assets/tac.svg" class="TicTac-ico"></div>
            </div>
        </div>
        <div class="new_game">
            <a href="#">Рестарт</a>
        </div>
    </div>
</body>
</html>