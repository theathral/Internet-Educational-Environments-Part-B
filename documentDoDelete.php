<?php

include "connector.php";
session_start();

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $document = mysqli_query($connector, "SELECT * FROM document WHERE id='$id'");

    if (mysqli_num_rows($document) == 1) {
        while ($record = mysqli_fetch_assoc($document)) {
            unlink($record['directory']);
        }
    }

    mysqli_query($connector, "DELETE FROM document WHERE id='$id'");

    header("Location: document.php");
}
