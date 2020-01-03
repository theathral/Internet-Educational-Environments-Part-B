<?php
include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

$tutors = mysqli_query($connector, "SELECT * FROM user WHERE role='t'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Communication</title>
</head>
<body>

<!-- The Title -->
<div class="myTitle">
    <h1>
        Communication
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="index.php">Home Page</a>
    <a href="announcement.php">Announcements</a>
    <a class="active">Communication</a>
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
    You can contact the professor by email through:

    <ul>
        <li>Web Form</li>
        <li>Email Address</li>
    </ul>

    <h2>
        Send email by web form:
    </h2>

    <div class="container">
        <form method="post" action="communicationSendEmail.php">

            <div class="row">
                <label for="from" class="bold">From:</label>
            </div>
            <div class="row">
                <input type="text" name="from" placeholder="Your mail..." required="required">
            </div>

            <div class="row">
                <label for="subject" class="bold">Subject:</label>
            </div>
            <div class="row">
                <input type="text" name="subject" placeholder="Subject..." required="required">
            </div>

            <div class="row">
                <label for="content" class="bold">Content:</label>
            </div>
            <div class="row">
                <textarea name="content" placeholder="Write your mail..." required="required"></textarea>
            </div>

            <div>
                <?php
                if (isset($_GET['error']))
                    echo "<a class='warning'>" . $_GET['error'] .
                        "</a>";
                ?>
            </div>

            <div class="row">
                <input type="submit" value="Send">
            </div>
        </form>
    </div>

    <hr>

    <h2>Send email by email address:</h2>

    <ul class="listNone">
        <li>Or, you can send an email at:
            <ul class="listNone">
                <?php
                if (mysqli_num_rows($tutors) > 0) {
                    while ($record = mysqli_fetch_assoc($tutors)) {
                        echo "<a href=mailto:'" . $record['username'] . "'>" . $record['username'] . "</a>
                                <br>";
                    }
                } else {
                    echo "<a class='italics'>(No tutors found)";
                }

                ?>
            </ul>
        </li>
    </ul>
</div>


</body>
</html>