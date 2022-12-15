<?php
    session_start();
    include_once ("../php/connect.php");

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "select * from users where login='$login'");
    $row = $result->fetch_assoc();

    if (!isset($row['login'])){
        $_SESSION['message'] = "Аккаунт не найден";
        header("Location: ../profile/signIn.php");
    }
    else {
        if (password_verify($password, $row['password'])){
            $_SESSION['user'] = $login;
            header("Location: ../content/start_pg.php");
        }
        else {
            $_SESSION['message'] = "Неверный пароль";
            header("Location: ../profile/signIn.php");
        }
    }

