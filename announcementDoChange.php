<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_POST['date']) && isset($_POST['title']) && isset($_POST['content'])) {
    $id = $_GET['edit'];
    $date = $_POST['date'];
    $subject = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($connector, "UPDATE announcement SET date = '$date', subject = '$subject', text = '$content' WHERE id='$id'");

    header("Location: announcement.php");
}
