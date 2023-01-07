<?php
    session_start();
    include_once ("connect.php");
    $room_id = $_SESSION['room'];
    $query = "delete from rooms where id='$room_id'";
    echo mysqli_query($conn, $query);

