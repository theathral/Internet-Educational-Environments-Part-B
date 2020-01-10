<?php
include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

if (!$checkTutor)
    header("Location: index.php");

$user = mysqli_query($connector, "SELECT * FROM user WHERE id = '" . $_SESSION['currentId'] . "'");
$currentTutors = mysqli_query($connector, "SELECT * FROM user WHERE role='t' ORDER BY name, surname");
$currentStudents = mysqli_query($connector, "SELECT * FROM user WHERE role='s' ORDER BY name, surname");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Changing Privileges</title>
</head>
<body>

<a id="top"></a>
<!-- The Title -->
<div class="myTitle">
    <h1>
        Change Privileges
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="index.php">Home Page</a>
    <a href="announcement.php">Announcements</a>
    <a href="communication.php">Communication</a>
    <a href="document.php">Documents</a>
    <a href="housework.php">Housework</a>
    <a class="logout" href="logout.php">Log Out</a>
    <a class="account" href="accountChange.php">Account</a>
    <?php
    if ($checkTutor)
        echo "<a class='privileges active' href='privileges.php'>Privileges</a>";
    ?>
</div>

<!-- Page content -->
<div class="content">

    <h2 class="italics underline">Tutors</h2>

    <?php

    if (mysqli_num_rows($currentTutors) > 1) {
        while ($record = mysqli_fetch_assoc($currentTutors)) {
            if ($record['id'] != $_SESSION['currentId']) {
                echo "<a class='bold'>" . $record['name'] . " " . $record['surname'] . "</a>" .
                        "<a href='privilegesDoChange.php?downgrade=" . $record['id'] . "'><img class='editIcon' src='images/downArrow.png' alt='downgrade action'></a>" .
                        "<a href='privilegesDoDelete.php?delete=" . $record['id'] . "'><img class='editIcon' src='images/delete.png' alt='delete action'></a>" .

                    "<ul class='listNone'>" .
                    "<li><a class=bold> Username / E-mail: </a>" . $record['username'] . "</li>" .
                    "<li><a class=bold> Role: </a> Tutor</li>" .
                    "</ul>
                <hr>";
            }
        }
    } else {
        echo "<a class='italics'>(No extra tutors found)";
    }


    ?>

    <h2 class="italics underline">Students</h2>

    <?php

    if (mysqli_num_rows($currentStudents) > 0) {
        while ($record = mysqli_fetch_assoc($currentStudents)) {
            echo "<a class='bold'>" . $record['name'] . " " . $record['surname'] . "</a>" .
                    "<a href='privilegesDoChange.php?upgrade=" . $record['id'] . "'><img class='editIcon' src='images/upArrow.png' alt='upgrade action'></a>" .
                    "<a href='privilegesDoDelete.php?delete=" . $record['id'] . "'><img class='editIcon' src='images/delete.png' alt='delete action'></a>" .

                "<ul class='listNone'>" .
                "<li><a class=bold> Username: </a>" . $record['username'] . "</li>" .
                "<li><a class=bold> Role: </a> Student</li>" .
                "</ul>
            <hr>";
        }
    } else {
        echo "<a class='italics'>(No students found)";
    }

    ?>
</div>

</body>
</html>
