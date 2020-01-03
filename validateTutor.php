<?php
include "connector.php";

$id = $_SESSION['currentId'];
$user = mysqli_query($connector, "SELECT * FROM user WHERE id='$id'");

while ($rec = mysqli_fetch_assoc($user)) {
    $checkTutor = false;
    if ($rec['role'] == 't')
        $checkTutor = true;
}
