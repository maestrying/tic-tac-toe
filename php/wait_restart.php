<?php
    session_start();
    include_once ('connect.php');

    $room_id = $_SESSION['room'];

    $query = mysqli_query($conn, "select * from rooms where id='$room_id'");
    $room = $query->fetch_assoc();

    if ($room['game_end'] == null){
        echo ('restart');
    }
