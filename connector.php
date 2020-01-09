<?php
$connector = mysqli_connect("localhost", "theathral1", "theathral1", "elearning");
if (!$connector) die("Couldn't connect to the database " . mysqli_error());