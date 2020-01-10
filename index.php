<?php
include "validate.php";
$checkTutor = false;
include "validateTutor.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body translate="no">

<!-- The Title -->
<div class="myTitle">
    <h1>
        Home Page
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a class="active">Home Page</a>
    <a href="announcement.php">Announcements</a>
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
    Welcome to the course Internet Educational Environments<br>
    <br>

    The aim is to learn the basics on creating a website<br>
    The site contains:<br>
    <ul class="listNone">
        <li>Announcements: The announcements for the course.</li>
        <li>Communication: The forum of the course.</li>
        <li>Documents: The documents that refer to the course.</li>
        <li>Housework: The projects that the students can download.</li>
    </ul>

    <img class="image" src="images/html5-css3.jpg" alt="html and css logo">
</div>

</body>
</html>