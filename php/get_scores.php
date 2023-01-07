<?php
    session_start();
    include_once ('connect.php');
    $room_id = $_SESSION['room'];
    $query = mysqli_query($conn, "select host_score, guest_score from rooms where id='$room_id'");
    $result = $query->fetch_assoc();

    if (isset($_SESSION['host'])){
        $result += ['user'=>'host'];
    }
    else {
        $result += ['user'=>'guest'];
    }

    echo json_encode($result);
