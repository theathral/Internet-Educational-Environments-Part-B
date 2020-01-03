<?php
include "validate.php";
include "connector.php";

$checkTutor = false;
include "validateTutor.php";

$currentId = $_SESSION['currentId'];

$user = mysqli_query($connector, "SELECT * FROM user WHERE id='$currentId'");

if (mysqli_num_rows($user) != 1)
    header("Location: index.php");

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Change Account Settings</title>
    </head>
    <body>

    <!-- The Title -->
    <div class="myTitle">
        <h1>
            Change Account Settings
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
        <a class="account active">Account</a>
        <?php
        if ($checkTutor)
            echo "<a class='privileges' href='privileges.php'>Privileges</a>";
        ?>
    </div>

    <!-- Page content -->

<?php
while ($rec = mysqli_fetch_assoc($user)) {
    echo "
<div class='content'>
    <div class='container'>
        <form method='post' action='accountDoChange.php'>

            <div class='row'>
                <label for='name'>Name:</label>
            </div>
            <div class='row'>
                <input type='text' name='name' placeholder='Your name...' value='" . $rec['name'] . "' required='required'>
            </div>

            <div class='row'>
                <label for='surname'>Surname:</label>
            </div>
            <div class='row'>
                <input type='text' name='surname' placeholder='Your surname...' value='" . $rec['surname'] . "' required='required'>
            </div>

            <div class='row'>
                <label for='username'>Username:</label>
            </div>
            <div class='row'>
                <input type='email' name='username' placeholder='info@example.com' value='" . $rec['username'] . "' required='required'>
            </div>

            <div class='row'>
                <label for='password'>Password:</label>
            </div>
            <div class='row'>
                <input type='password' name='password' placeholder='Your password...' value='" . $rec['password'] . "' required='required'>
            </div>
            

            <div>";

            if (isset($_GET['error']))
                echo "<a class='warning'>" . $_GET['error'] . "</a>";

            echo "</div>
            <div class='row'>
                <input type='submit' value='Change Account Settings'>
            </div>";

            if ($rec['role'] == 's') {
                echo "<div class='bold italics'>
                    Note: Ask an existing tutor to promote you to tutor.
                </div>";
            }
        
            echo "</form>

            <form action='accountDoDelete.php' method='post' >      
                <input class='cancel' name='deleteAccount' type='submit' value='Delete Account'>
            </form>
                
            </div>
        </div>";
    }?>

</body>
</html>
