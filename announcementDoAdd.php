<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_POST['date']) && isset($_POST['title']) && isset($_POST['content'])) {
    $date = $_POST['date'];
    $subject = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($connector, "INSERT INTO announcement (date, subject, text) VALUES ('$date', '$subject', '$content')");

    header("Location: announcement.php");
}