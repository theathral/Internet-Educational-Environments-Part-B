<?php
include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

$user = mysqli_query($connector, "SELECT * FROM user WHERE id = '" . $_SESSION['currentId'] . "'");
$currentAnnouncements = mysqli_query($connector, "SELECT * FROM announcement ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Announcements</title>
</head>
<body>

<a id="top"></a>
<!-- The Title -->
<div class="myTitle">
    <h1>
        Announcements
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="index.php">Home Page</a>
    <a class="active">Announcements</a>
    <a href="communication.php">Communication</a>
    <a href="document.php">Documents</a>
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
    <?php

    while ($record = mysqli_fetch_assoc($user)) {

        if ($checkTutor) {
            echo '<a href="announcementAdd.php"><button type="button">Add new announcement</button></a>';
        }
    }

    while ($record = mysqli_fetch_assoc($currentAnnouncements)) {
        echo "<h2>Announcement " . $record['id'];

        if ($checkTutor) {
            echo " ";
            echo "<a href='announcementChange.php?edit=" . $record['id'] . "'>
                    <img class='editIcon' src='images/edit.png' alt='edit action'></a>";
            echo " ";
            echo "<a href='announcementDoDelete.php?delete=" . $record['id'] . "'>
                    <img class='editIcon' src='images/delete.png' alt='delete action'/></a>";
        }

        echo "</h2>" .


            "<ul class='listNone'>" .
            "<li><a class='bold'> Date: </a>" . $record['date'] . "</li>" .
            "<li><a class='bold'> Subject: </a>" . $record['subject'] . "</li>" .
            "<li><pre>" . $record['text'] . "</pre></li>" .
            "</ul>
        <hr>
        ";
    }

    if (mysqli_num_rows($currentAnnouncements) == 0) {
        echo "<hr><a class='italics'>(No announcements found)";
    }

    ?>

    <p>
        <a href="#top">
            <img class="topButton" src="images/topButton.svg" alt="top button">
        </a>
    </p>
</div>

</body>
</html>