<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_POST['title'])) {

    $doc = $_GET['edit'];

    $title = $_POST['title'];
    $description = $_POST['description'];

    if (isset($_FILES['file']) && $_FILES['file']['name'] !== '') {
        $target_dir = "documents/";
        $file_tmp = $_FILES['file']['tmp_name'];
        $path_parts = pathinfo($_FILES['file']['name']);
        $extension = $path_parts['extension'];

        $old = mysqli_query($connector, "SELECT * FROM document WHERE id='$doc'");

        while ($record = mysqli_fetch_assoc($old)) {
            $rec = $record['directory'];

            $document = $target_dir . "document-" . date('Y-m-d-H-i-s') . "." . $extension;

            unlink($rec);
            move_uploaded_file($_FILES['file']['tmp_name'], $document);
        }

        mysqli_query($connector, "UPDATE document SET directory = '$document' WHERE id='$doc'");
    }


    mysqli_query($connector, "UPDATE document SET title = '$title', description = '$description' WHERE id='$doc'");

    header("Location: document.php");
}
