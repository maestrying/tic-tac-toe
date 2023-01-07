<?php
    session_start();
    include_once ("connect.php");
    $room_id = $_POST['room_id'];

    $find_room = mysqli_query($conn, "select * from rooms where id='$room_id'");
    $finded = $find_room->fetch_assoc();

    if (isset($finded['id']) && $finded['guest_id'] == null){

        $login = $_SESSION['user'];
        $result = mysqli_query($conn, "select * from users where login='$login'");
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        $join = mysqli_query($conn, "update rooms set guest_id='$user_id' where id='$room_id'");

        // распределение крестиков-ноликов
        if (rand(0, 10) % 2 == 0){
            $tic = $finded['host_id'];
            $tac = $user_id;
        }
        else {
            $tic = $user_id;
            $tac = $finded['host_id'];
        }
        mysqli_query($conn, "update rooms set tic='$tic', tac='$tac' where id='$room_id'");

        $_SESSION['room'] = $room_id;
        $_SESSION['guest'] = $user_id;
        header("Location: ../content/room.php");
    }
    else {
        if ($finded['guest_id'] != null){
            $_SESSION['message'] = "Комната занята";
        }
        else {
            $_SESSION['message'] = "Комната не найдена";
        }

        header("Location: ../content/conn_room.php");
    }




