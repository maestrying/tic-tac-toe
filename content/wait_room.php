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
        <div class="container" style="height: 200px; justify-content: center;">
            <div class="block-with-code">
                <p class="rule_descr" style="text-align: center; margin-top: 0">Код игры:</p>
                <div class="rule code"><?= $_SESSION['room'] ?></div>
            </div>
            <h2 style="margin-top: 20px;">Ожидание игрока</h2>
        </div>
        <div class="field" style="margin-top: 40px;">
            <div class="field-horizon">
                <div class="field_block-1"></div>
                <div class="field_block-2"></div>
                <div class="field_block-3"></div>
            </div>
            <div class="field-horizon">
                <div class="field_block-4"></div>
                <div class="field_block-5"></div>
                <div class="field_block-6"></div>
            </div>
            <div class="field-horizon">
                <div class="field_block-7"></div>
                <div class="field_block-8"></div>
                <div class="field_block-9"></div>
            </div>
        </div>
    </div>
    <script src="../scripts/jquery.min.js"></script>
    <script>
        function check_guest(){
            $.ajax({
                url: "../php/check_guest.php",
                type: "post",
                data: $(this).serialize(),
                success: function (data){
                    if (data === "joined"){
                        window.location.href = '../content/room.php';
                    }
                }
            })
        }
        setInterval(check_guest, 1000);
    </script>
</body>
</html>