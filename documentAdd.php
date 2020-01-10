<?php

include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Adding Document</title>
</head>
<body>

<a id="top"></a>
<!-- The Title -->
<div class="myTitle">
    <h1>
        Add New Document
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="index.php">Home Page</a>
    <a href="announcement.php">Announcements</a>
    <a href="communication.php">Communication</a>
    <a class="active" href="document.php">Documents</a>
    <a href="housework.php">Housework</a>
    <a class="logout" href="logout.php">Log Out</a>
    <a class="account" href="accountChange.php">Account</a>
    <?php
    if ($checkTutor)
        echo "<a class='privileges' href='privileges.php'>Privileges</a>";
    ?>
</div>

<!-- Page content -->
<div class="content">

    <div class="container">
        <form method="post" action="documentDoAdd.php" enctype="multipart/form-data">

            <div class="row">
                <label for="title">Title:</label>
            </div>
            <div class="row">
                <input type="text" name="title" placeholder="Your title..." required="required">
            </div>

            <div class="row">
                <label for="description">Description:</label>
            </div>
            <div class="row">
                <textarea name="description" placeholder="Your description..." required="required"></textarea>
            </div>

            <div class="row">
                <label for="file">File:</label>
            </div>
            <div class="row">
                <input type="file" name="file" required="required">
            </div>

            <div>
                <?php
                if (isset($_GET['error']))
                    echo "<a class='warning'>" . $_GET['error'] . "</a>";
                ?>
            </div>

            <div class="row">
                <input type="submit" value="Create">
            </div>
        </form>

        <form action='document.php' method='post' >
            <input class='cancel' name='cancel' type='submit' value='Cancel'>
        </form>
    </div>

</body>
</html>