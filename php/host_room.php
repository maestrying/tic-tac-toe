<?php
    session_start();
    include_once ("connect.php");

    $login = $_SESSION['user'];

    $result = mysqli_query($conn, "select * from users where login='$login'");
    $row = $result->fetch_assoc();
    $room_id = rand(1000, 9999);

    $query = "insert into rooms (id, host_id) values ('$room_id', '$row[id]')";
    mysqli_query($conn, $query);

    $_SESSION['room'] = $room_id;
    $_SESSION['host'] = $row['id'];
    header('Location: ../content/wait_room.php');



