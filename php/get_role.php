<?php
    session_start();
    include_once("connect.php");
    $user = $_SESSION['user'];
    $room_id = $_SESSION['room'];
    $result = mysqli_query($conn, "SELECT rooms.id, users.id, `login`, `tic`, `tac` from users, rooms where rooms.id = '$room_id' and login = '$user'");

    $row = $result->fetch_assoc();
    $tic = $row['tic'];
    $tac = $row['tac'];
    if ($row['id'] == $row['tic']){
        echo("tic");
    }
    else if ($row['id'] == $row['tac']){
        echo ("tac");
    }

