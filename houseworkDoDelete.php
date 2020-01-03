<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $document = mysqli_query($connector, "SELECT * FROM project WHERE id='$id'");

    if (mysqli_num_rows($document) == 1) {
        while ($record = mysqli_fetch_assoc($document)) {
            unlink($record['directory']);
        }
    }

    mysqli_query($connector, "DELETE FROM project WHERE id='$id'");

    mysqli_query($connector, "INSERT INTO announcement (date, subject, text)
        VALUES (current_date(), 'A project has been deleted', 'The project " . $id . " has been deleted')");


    header("Location: housework.php");
}
