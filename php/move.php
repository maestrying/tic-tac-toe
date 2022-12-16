<?php
    session_start();
    include_once("connect.php");
    $move = $_POST['block_id'];
    $role = $_POST['role'];

    $room_id = $_SESSION['room'];
    $result = mysqli_query($conn, "select * from rooms where id='$room_id'");
    $row = $result->fetch_assoc();
    $field = $row['field'];

    if ($field[$move - 1] == "#"){
        if ($role === "tic"){
            $field[$move - 1] = "X";
        }
        else {
            $field[$move - 1] = "O";
        }
        mysqli_query($conn, "update rooms set field='$field' where id='$room_id'");
    }


