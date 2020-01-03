<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    mysqli_query($connector, "DELETE FROM announcement WHERE id='$id'");

    header("Location: announcement.php");
}