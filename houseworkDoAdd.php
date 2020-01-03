<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_POST['goals']) && isset($_POST['deliverables']) && isset($_POST['deadline'])
    && isset($_FILES['file']) && $_FILES['file']['name'] !== '') {

    $goals = $_POST['goals'];
    $deliverables = $_POST['deliverables'];
    $submission = $_POST['deadline'];

    $target_dir = "projects/";
    $file_tmp = $_FILES['file']['tmp_name'];
    $path_parts = pathinfo($_FILES['file']['name']);
    $extension = $path_parts['extension'];

    $id = mysqli_query($connector, "SELECT MAX(id) AS projectId FROM document");

    $document = $target_dir . "assignment-" . date('Y-m-d-H-i-s') . "." . $extension;

    move_uploaded_file($_FILES['file']['tmp_name'], $document);

    mysqli_query($connector, "INSERT INTO project (goals, directory, deliverables, submission_date)
        VALUES ('$goals', '$document', '$deliverables', '$submission')");


    $id = mysqli_query($connector, "SELECT MAX(id) AS projectId FROM project");

    while ($record = mysqli_fetch_assoc($id)) {
        mysqli_query($connector, "INSERT INTO announcement (date, subject, text)
            VALUES (current_date(), 'The project " . $record['projectId'] . " is now available', 'The deadline is at $submission')");
    }

    header("Location: housework.php");
}
