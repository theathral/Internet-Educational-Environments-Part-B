<?php
include "validateNot.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Create Account</title>
</head>
<body>

<!-- The Title -->
<div class="myTitle">
    <h1>
        Create Account
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a href="login.php">Login</a>
    <a class="active">New User</a>
</div>

<!-- Page content -->
<div class="content">
    <div class="container">
        <form method="post" action="accountDoCreate.php">

            <div class="row">
                <label for="name">Name:</label>
            </div>
            <div class="row">
                <input type="text" name="name" placeholder="Your name..." required="required">
            </div>

            <div class="row">
                <label for="surname">Surname:</label>
            </div>
            <div class="row">
                <input type="text" name="surname" placeholder="Your surname..." required="required">
            </div>

            <div class="row">
                <label for="username">Username / E-mail:</label>
            </div>
            <div class="row">
                <input type="email" name="username" placeholder="info@example.com" required="required">
            </div>

            <div class="row">
                <label for="password">Password:</label>
            </div>
            <div class="row">
                <input type="password" name="password" placeholder="Your password..." required="required">
            </div>

            <div>
                <?php
                if (isset($_GET['error']))
                    echo "<a class='warning'>" . $_GET['error'] .
                        "</a>";
                ?>
            </div>

            <div class="row">
                <input type="submit" value="Create Account">
            </div>

            <div class="bold italics">
                Note: Ask an existing tutor to promote you to tutor.
            </div>
        </form>

        <form action='login.php' method='post' >
            <input class='cancel' name='cancel' type='submit' value='Cancel'>
        </form>
    </div>
</div>


</body>
</html>
