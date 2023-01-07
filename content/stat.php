<?php
    session_start();

    include_once ("../php/connect.php");

    if (isset($_SESSION['room'])){
        $room_id = $_SESSION['room'];
        $query = "delete from rooms where id='$room_id'";
        mysqli_query($conn, $query);
        unset($_SESSION['host']);
        unset($_SESSION['guest']);
        unset($_SESSION['room']);
    }

    if (!isset($_SESSION['user'])){
        header("Location: start_pg.php");
    }

    $login = $_SESSION['user'];
    $query = mysqli_query($conn, "select * from users where login='$login'");
    $user = $query->fetch_assoc();
    $user_id = $user['id'];

    $query = mysqli_query($conn, "select * from stats where user_id='$user_id'");
    $stats = $query->fetch_assoc();
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
                <a>Статистика</a>
                <a href="../php/logout.php">Выход</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="container" style="height: 600px;">
            <div class="stat_h">Статистика</div>
            <div class="stat_table">
                <div class="stat_cont">
                    <div class="stat_label">кол-во игр</div>
                    <div class="stat_num"><?= $stats['win'] + $stats['lose'] + $stats['draw'] ?></div>
                </div>
                <div class="stat_cont">
                    <div class="stat_label">побед</div>
                    <div class="stat_num"><?= $stats['win'] ?></div>
                </div>
                <div class="stat_cont">
                    <div class="stat_label">поражений</div>
                    <div class="stat_num"><?= $stats['lose'] ?></div>
                </div>
                <div class="stat_cont">
                    <div class="stat_label">ничьи</div>
                    <div class="stat_num"><?= $stats['draw'] ?></div>
                </div>
            </div>
            <div class="adv">
                <p class="adv-ph">здесь могла быть ваша реклама</p>
                <p class="adv-examp">например:</p>
                <div class="git-links">
                    <div class="link_cont">
                        <a href="https://github.com/maestrying" class="git-link" target="_blank">maestrying</a>
                    </div>
                    <div class="link_cont">
                        <a href="https://github.com/lonelywh1te" class="git-link" target="_blank">lonelywh1te</a>
                    </div>
                </div>
                <img src="../assets/git-ico.svg" alt="git-ico" style="width: 150px;">
            </div>
        </div>
    </div>
</body>
</html>