<?php
include "validateNot.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

<!-- The Title -->
<div class="myTitle">
    <h1>
        Login
    </h1>
</div>

<!-- The sidebar -->
<div class="sidebar">
    <a class="active">Login</a>
    <a href="accountCreate.php">New User</a>
</div>

<!-- Page content -->
<div class="content">
    <div class="container">
        <form method="post" action="loginDo.php">

            <div class="row">
                <label for="username">Username / E-mail:</label>
            </div>
            <div class="row">
                <input type="email" name="username" placeholder="Your username..." required="required">
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
                <input type="submit" value="Login">
            </div>
        </form>

        <form action='accountCreate.php' method='post' >
            <input class='cancel' name='createAccount' type='submit' value='Create Account'>
        </form>
    </div>

</body>
</html>