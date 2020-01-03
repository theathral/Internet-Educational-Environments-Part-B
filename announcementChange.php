<?php

include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

$currentId = $_GET['edit'];

$record = mysqli_query($connector, "SELECT * FROM announcement WHERE id='$currentId'");

if (mysqli_num_rows($record) != 1)
    header("Location: announcement.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Changing Announcements</title>
</head>
<body>

<a id="top"></a>
<!-- The Title-->
<div class="myTitle">
    <h1>
        Change Announcement
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="index.php">Home Page</a>
    <a class="active" href="announcement.php">Announcements</a>
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

    while ($rec = mysqli_fetch_assoc($record)) {
        echo "<div class='container'>
            <form method='post' action='announcementDoChange.php?edit=" . $currentId . "'>
    
                <div class='row'>
                    <label for='date'>Date:</label>
                </div>
                <div class='row'>
                    <input type='date' name='date' value='" . $rec["date"] . "' required='required' readonly>
                </div>
    
                <div class='row'>
                    <label for='title'>Title:</label>
                </div>
                <div class='row'>
                    <input type='text' name='title' value='" . $rec['subject'] . "' placeholder='Your title...' required='required'>
                </div>
    
                <div class='row'>
                    <label for='content'>Content:</label>
                </div>
                <div class='row'>
                    <textarea name='content' placeholder='Your content...' required='required'>" . $rec['text'] . "</textarea>
                </div>
    
                <div class='row'>
                    <input type='submit' value='Save Changes'>
                </div>
            </form>
            
            <form action='announcement.php' method='post' >
                <input class='cancel' name='cancel' type='submit' value='Cancel'>
            </form>
        </div>";
    }
    ?>


</div>

</body>
</html>
