<?php
    $conn = new mysqli("your_server", "your_username", "your_password", "your_database_name");

    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
