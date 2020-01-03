<?php

include "connector.php";
session_start();

if (isset($_POST['name']) && isset($_POST['surname']) &&
    isset($_POST['username']) && isset($_POST['password'])) {

    $id = $_SESSION['currentId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkValid = mysqli_query($connector, "SELECT * FROM user WHERE username='$username'");

    $check = false;
    if ($rec = mysqli_fetch_assoc($checkValid)) {
        if ($rec['id'] == $id)
            $check = true;
    }

    if (mysqli_num_rows($checkValid) == 0 || $check) {
        mysqli_query($connector, "UPDATE user SET name='$name', surname='$surname',
            username='$username', password='$password' WHERE id='$id'");

        header("Location: index.php");
    } else {
        header('Location: accountChange.php?error=The user exists');
    }

}

