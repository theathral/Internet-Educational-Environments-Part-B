<?php
$connector = mysqli_connect("localhost", "root", "", "elearning");
if (!$connector) die("Couldn't connect to the database : " . mysqli_error());