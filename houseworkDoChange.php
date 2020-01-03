<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_POST['goals']) && isset($_POST['deliverables']) && isset($_POST['deadline'])) {

    $doc = $_GET['edit'];

    $goals = $_POST['goals'];
    $deliverables = $_POST['deliverables'];
    $submission = $_POST['deadline'];

    if (isset($_FILES['file']) && $_FILES['file']['name'] !== '') {
        $target_dir = "projects/";
        $file_tmp = $_FILES['file']['tmp_name'];
        $path_parts = pathinfo($_FILES['file']['name']);
        $extension = $path_parts['extension'];

        $old = mysqli_query($connector, "SELECT * FROM project WHERE id='$doc'");

        while ($record = mysqli_fetch_assoc($old)) {
            $rec = $record['directory'];

            $document = $target_dir . "assignment-" . date('Y-m-d-H-i-s') . "." . $extension;

            unlink($rec);
            move_uploaded_file($_FILES['file']['tmp_name'], $document);
        }

        mysqli_query($connector, "UPDATE project SET directory = '$document' WHERE id='$doc'");
    }

    mysqli_query($connector, "UPDATE project SET goals = '$goals', deliverables = '$deliverables', submission_date = '$submission'");

    mysqli_query($connector, "INSERT INTO announcement (date, subject, text)
        VALUES (current_date(), 'The project " . $doc . " has been changed', 'The deadline is at $submission')");


    header("Location: housework.php");
}
