<?php
include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

$user = mysqli_query($connector, "SELECT * FROM user WHERE id = '" . $_SESSION['currentId'] . "'");
$currentProjects = mysqli_query($connector, "SELECT * FROM project ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Housework</title>
</head>
<body>

<a id="top"></a>
<!-- The Title -->
<div class="myTitle">
    <h1>
        Housework
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="index.php">Home Page</a>
    <a href="announcement.php">Announcements</a>
    <a href="communication.php">Communication</a>
    <a href="document.php">Documents</a>
    <a class="active">Housework</a>
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

    if ($checkTutor) {
        echo '<a href="houseworkAdd.php"><button type="button">Add new project</button></a>';
    }


    while ($record = mysqli_fetch_assoc($currentProjects)) {
        echo "       
        <h2>Project " . $record['id'];

            if ($checkTutor) {
                echo " ";
                echo "<a href='houseworkChange.php?edit=" . $record['id'] . "'>
                    <img class='editIcon' src='images/edit.png' alt='edit action'></a>";
                echo " ";
                echo "<a href='houseworkDoDelete.php?delete=" . $record['id'] . "'>
                    <img class='editIcon' src='images/delete.png' alt='delete action'/></a>";
            }

            echo "</h2>" .

            "<ul class=\"listNone\">" .
                "<li><a class=\"italics\"> Goals: </a></li>" .
                "<ul class='listNone'>" .
                    "<li><pre>" . $record['goals'] . "</pre></li>" .
                "</ul>".
                "<li><a class=\"italics\"> Pronunciation: </a></li>" .
                "<ul class='listNone'>" .
                    "<li><pre>Download the pronunciation from: <a href=" . $record['directory'] . ">here</a></</li>" .
                "</ul>" .
                "<li><a class=\"italics\"> Deliverables: </a></li>" .
                "<ul class='listNone'>" .
                    "<li><pre>" . $record['deliverables'] . "</pre></li>" .
                "</ul>" .
                "<li><a class='deadline'> Deadline: </a>" . $record['submission_date'] . "</li>" .
            "</ul>
        <hr>
        ";
    }

    if (mysqli_num_rows($currentProjects) == 0) {
        echo "<hr><a class='italics'>(No projects found)";
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