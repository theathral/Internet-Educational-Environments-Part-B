<?php
include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

$currentId = $_GET['edit'];

$record = mysqli_query($connector, "SELECT * FROM project WHERE id='$currentId'");

if (mysqli_num_rows($record) != 1)
    header("Location: document.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Changing Housework</title>
</head>
<body>

<a id="top"></a>
<!-- The Title -->
<div class="myTitle">
    <h1>
        Change Housework
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="index.php">Home Page</a>
    <a href="announcement.php">Announcements</a>
    <a href="communication.php">Communication</a>
    <a href="document.php">Documents</a>
    <a class="active" href="housework.php">Housework</a>
    <a class="logout" href="logout.php">Log Out</a>
    <a class="account" href="accountChange.php">Account</a>
    <?php
    if ($checkTutor)
        echo "<a class='privileges' href='privileges.php'>Privileges</a>";
    ?>
</div>

<!-- Page content -->
<div class="content">

    <?php

    while ($rec = mysqli_fetch_assoc($record)) {

        echo "<div class='container'>
        <form method='post' action='houseworkDoChange.php?edit=" . $currentId . "' enctype='multipart/form-data'>

            <div class='row'>
                <label for='goals'>Goals:</label>
            </div>
            <div class='row'>
                <textarea name='goals' placeholder='Your goals...' required='required'>" . $rec['goals'] . "</textarea>
            </div>

            <div class='row'>
                <label for='deliverables'>Deliverables:</label>
            </div>
            <div class='row'>
                <textarea name='deliverables' placeholder='Your deliverables...' required='required'>" . $rec['deliverables'] . "</textarea>
            </div>

            <div class='row'>
                <label for='file'>File:</label>
            </div>
            <div class='row'>
                <input type='file' name='file'>
            </div>

            <div class='row'>
                <label for='deadline'>Deadline:</label>
            </div>
            <div class='row'>
                <input type='date' name='deadline' value='" . $rec['submission_date'] . "' required='required'>
            </div>

            <div>";
        if (isset($_GET['error']))
            echo "<a class='warning'>" . $_GET['error'] . "</a>";

        echo "</div>

            <div class='row'>
                <input type='submit' value='Save Changes'>
            </div>
        </form>

        <form action='housework.php' method='post' >
            <input class='cancel' name='cancel' type='submit' value='Cancel'>
        </form>
    </div>";
    }
    ?>

</body>
</html>