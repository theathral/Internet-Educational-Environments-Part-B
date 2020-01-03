<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_POST['title']) && isset($_FILES['file']) && $_FILES['file']['name'] !== '') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $target_dir = "documents/";
    $file_tmp = $_FILES['file']['tmp_name'];
    $path_parts = pathinfo($_FILES['file']['name']);
    $extension = $path_parts['extension'];

    $document = $target_dir . "document-" . date('Y-m-d-H-i-s') . "." . $extension;

    move_uploaded_file($_FILES['file']['tmp_name'], $document);

    mysqli_query($connector, "INSERT INTO document (title, description, directory)
        VALUES ('$title', '$description','$document')");

    header("Location: document.php");

}
