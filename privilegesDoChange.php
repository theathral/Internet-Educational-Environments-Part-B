<?php

include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

session_start();

$upgrade = $_GET['upgrade'];
$downgrade = $_GET['downgrade'];

if ($upgrade || $downgrade) {


    $user = mysqli_query($connector, "SELECT * FROM user WHERE id='$upgrade' OR id='$downgrade'");

    if ($upgrade) {
        mysqli_query($connector, "UPDATE user SET role='t' WHERE id='$upgrade'");
    } else {
        mysqli_query($connector, "UPDATE user SET role='s' WHERE id='$downgrade'");
    }

    header("Location: privileges.php");
}

