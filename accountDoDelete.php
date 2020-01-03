<?php

include "connector.php";
session_start();

if (isset($_POST['deleteAccount'])) {

    $id = $_SESSION['currentId'];
    mysqli_query($connector, "DELETE FROM user WHERE id='$id'");

    include "logout.php";

    header("Location: index.php");
}