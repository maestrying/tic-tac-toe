<?php
    session_start();
    include_once ("../php/connect.php");
    $room_id = $_SESSION['room'];

    // если пользователь является хостом
    if (isset($_SESSION['host'])){
        $query = mysqli_query($conn, "SELECT login FROM rooms join users on users.id = rooms.guest_id");
        $guest = $query->fetch_assoc();
        $enemy_name = $guest['login'];

    }
    // если пользователь является гостем
    if (isset($_SESSION['guest'])){
        $query = mysqli_query($conn, "SELECT login FROM rooms join users on users.id = rooms.host_id");
        $host = $query->fetch_assoc();
        $enemy_name = $host['login'];
    }

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
            <div class="game_info" id="first_player" style="color: white; justify-content: flex-start;">
                <div class="counter">0</div>
                <div class="info_cont">
                    <div class="info_name"><?= $_SESSION['user'] ?></div>
                    <div class="info_time">1:00</div>
                </div>
            </div>
            <div class="game_info" id="second_player" style="color: white; justify-content: flex-end;">
                <div class="info_cont" style="align-items: flex-end;">
                    <div class="info_name"><?= $enemy_name ?></div>
                    <div class="info_time">1:00</div>
                </div>
                <div class="counter">0</div>
            </div>
        </div>
        <div class="field" style="margin-top: 40px;">
            <div class="field-horizon">
                <div class="field_block-1" id="1" onclick="move(this.id)"></div>
                <div class="field_block-2" id="2" onclick="move(this.id)"></div>
                <div class="field_block-3" id="3" onclick="move(this.id)"></div>
            </div>
            <div class="field-horizon">
                <div class="field_block-4" id="4" onclick="move(this.id)"></div>
                <div class="field_block-5" id="5" onclick="move(this.id)"></div>
                <div class="field_block-6" id="6" onclick="move(this.id)"></div>
            </div>
            <div class="field-horizon">
                <div class="field_block-7" id="7" onclick="move(this.id)"></div>
                <div class="field_block-8" id="8" onclick="move(this.id)"></div>
                <div class="field_block-9" id="9" onclick="move(this.id)"></div>
            </div>
        </div>
        <div class="new_game">
            <a href="#">Рестарт</a>
        </div>
    </div>
    <script src="../scripts/jquery.min.js"></script>
    <script>
        let role = get_role();

        // обновление поля
        function update_field(){
            $.ajax({
                url: "../php/get_field.php",
                type: "post",
                data: $(this).serialize(),
                success: function (data){
                    if (last_field === data) return;
                    let id = 1;
                    for(let i of data) {
                        if (i === "X") {
                            document.getElementById(String(id)).innerHTML = '<img alt="X" src="../assets/tic.svg" class="TicTac-ico">';
                        }
                        else if (i === "O") {
                            document.getElementById(String(id)).innerHTML = '<img alt="O" src="../assets/tac.svg" class="TicTac-ico">';
                        }
                        else {
                            document.getElementById(String(id)).innerHTML = "";
                        }
                        id++;
                    }
                    last_field = data;
                }
            })
        }
        setInterval(update_field, 1000 / 5);

        // распределение ролей
        function get_role(){
            return $.ajax({
                async: false,
                url: "../php/get_role.php",
                type: "post",
                data: $(this).serialize(),
                success: function get(data){
                    if (data === "tic"){
                        $('#first_player').css('color', '#B44444');
                        $('#second_player').css('color', '#44B4A0');

                    }
                    else {
                        $('#first_player').css('color', '#44B4A0');
                        $('#second_player').css('color', '#B44444');
                    }
                }
            }).responseText;
        }

        // запрос актуального поля
        function get_field(){
            return $.ajax({
                async: false,
                url: "../php/get_field.php",
                type: "post",
            }).responseText;
        }

        // обработка хода
        function move(id){
            $.ajax({
                url: "../php/move.php",
                type: "post",
                data: {block_id: id, role: role}
            })
        }
    </script>
</body>
</html>