<?php
    session_start();
    include_once ("../php/connect.php");

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $submit_password = mysqli_real_escape_string($conn, $_POST['submit_password']);

    $result = mysqli_query($conn, "select * from users where login='$login'");
    $row = $result->fetch_assoc();

    if (isset($row['login']) && $login != ""){
        $_SESSION['message'] = "Логин занят";
        header("Location: ../profile/signUp.php");
    }
    else if ($password  != $submit_password){
        $_SESSION['message'] = "Пароли не совпадают";
        header("Location: ../profile/signUp.php");
    }
    else {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn,"insert into users (login, password) values ('$login', '$hash')");

        $query = mysqli_query($conn, "select id from users where login='$login'");
        $result = $query->fetch_assoc();
        $user_id = $result['id'];
        mysqli_query($conn,"insert into stats (user_id) values ('$user_id')");

        $_SESSION['user'] = $login;
        header("Location: ../content/start_pg.php");
    }




