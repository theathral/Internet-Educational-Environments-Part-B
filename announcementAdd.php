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
    <title>Adding Announcements</title>
</head>
<body>

<a id="top"></a>
<!-- The Title -->
<div class="myTitle">
    <h1>
        Add New Announcement
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
    <div class="container">
        <form method="post" action="announcementDoAdd.php">

            <div class="row">
                <label for="date">Date:</label>
            </div>
            <div class="row">
                <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>

            <div class="row">
                <label for="title">Title:</label>
            </div>
            <div class="row">
                <input type="text" name="title" placeholder="Your title..." required="required">
            </div>

            <div class="row">
                <label for="content">Content:</label>
            </div>
            <div class="row">
                <textarea name="content" placeholder="Your content..." required="required"></textarea>
            </div>

            <div class="row">
                <input type="submit" value="Create">
            </div>
        </form>

        <form action='announcement.php' method='post' >
            <input class='cancel' name='cancel' type='submit' value='Cancel'>
        </form>

    </div>

</body>
</html>