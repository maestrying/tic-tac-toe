<?php
    session_start();
    include_once ('connect.php');

    $login = $_SESSION['user'];

    $query = mysqli_query($conn, "select * from users where login='$login'");
    $result = $query->fetch_assoc();

    echo $result['id'];