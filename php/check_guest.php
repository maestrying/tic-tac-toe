<?php
    session_start();
    include_once ("connect.php");

    $room_id = $_SESSION['room'];
    $result = mysqli_query($conn, "select * from rooms where id='$room_id'");
    $row = $result->fetch_assoc();
    if ($row['guest_id'] != null){
        echo "joined";
    }
