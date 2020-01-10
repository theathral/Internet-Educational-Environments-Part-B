<?php
include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

$user = mysqli_query($connector, "SELECT * FROM user WHERE id = '" . $_SESSION['currentId'] . "'");
$currentDocuments = mysqli_query($connector, "SELECT * FROM document ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Documents</title>
</head>
<body>

<a id="top"></a>
<!-- The Title -->
<div class="myTitle">
    <h1>
        Documents
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="index.php">Home Page</a>
    <a href="announcement.php">Announcements</a>
    <a href="communication.php">Communication</a>
    <a class="active">Documents</a>
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


    if ($checkTutor) {
        echo '<a href="documentAdd.php"><button type="button">Add new document</button></a>';
    }


    while ($record = mysqli_fetch_assoc($currentDocuments)) {
        echo "       
        <h2>Document " . $record['title'];

        if ($checkTutor) {
            echo " ";
            echo "<a href='documentChange.php?edit=" . $record['id'] . "'>
                    <img class='editIcon' src='images/edit.png' alt='edit action'></a>";
            echo " ";
            echo "<a href='documentDoDelete.php?delete=" . $record['id'] . "'>
                    <img class='editIcon' src='images/delete.png' alt='delete action'/></a>";
        }

        echo "</h2>" .

            "<ul class='listNone'" .
            "<li><a class='italics'>Description:</a></li>" .
                "<ul class='listNone'>
                    <li><pre>" . $record['description'] . "</pre></li>" .
                "</ul>" .
            "<li><a href=" . $record['directory'] . ">Download</a></li>" .
            "</ul>
        <hr>
        ";
    }

    if (mysqli_num_rows($currentDocuments) == 0) {
        echo "<hr><a class='italics'>(No documents found)";
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