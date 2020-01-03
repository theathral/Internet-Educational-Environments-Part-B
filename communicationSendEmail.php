<?php

include "connector.php";
session_start();

if (isset($_POST['from']) && isset($_POST['subject']) && isset($_POST['content'])) {
    $from = $_POST['from'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $tutors = mysqli_query($connector, "SELECT username FROM user WHERE role = 't'");

    if (mysqli_num_rows($tutors) > 0) {
        while ($currentTutor = mysqli_fetch_assoc($tutors)) {
            mail($currentTutor['username'], $subject, $content, "From: $from");
        }
    } else {
        header("Location: communication.php?error=No tutors detected.");
    }

    header("Location: communication.php");
}
