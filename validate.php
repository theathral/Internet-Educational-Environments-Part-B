<?php
session_start();

if (!((isset($_SESSION['currentId'])) && ($_SESSION['currentId'] > 0))) {
    header('Location: login.php');
    die();
}
