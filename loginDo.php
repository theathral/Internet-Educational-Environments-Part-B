<?php

include "connector.php";

session_start();

echo "fadsjfnlksd";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo $username;
    echo $password;

    $query = "SELECT id FROM user WHERE username = '$username' AND password='$password'";

    $result = mysqli_query($connector, $query);

    if (mysqli_num_rows($result) == 1) {
        while ($record = mysqli_fetch_assoc($result)) {
            $_SESSION['currentId'] = $record['id'];
            header('Location: index.php');
        }
    } else {
        header('Location: login.php?error=Wrong credentials!');
    }
}

