<?php
    session_start();
    include_once ('connect.php');
    $room_id = $_SESSION['room'];

    mysqli_query($conn, "update rooms set game_end='1' where id='$room_id'");


