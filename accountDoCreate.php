<?php

include "connector.php";
session_start();

if (isset($_POST['name']) && isset($_POST['surname']) &&
        isset($_POST['username']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $role = 's';

    $checkValid = mysqli_query($connector, "SELECT * FROM user WHERE username='$username'");

    if (mysqli_num_rows($checkValid) == 0) {
        mysqli_query($connector, "INSERT INTO user (name, surname, username, password, role)
            VALUES ('$name', '$surname', '$username', '$password', '$role')");

        header("Location: login.php");
    } else {
        header('Location: accountCreate.php?error=The user exists');
    }



}

