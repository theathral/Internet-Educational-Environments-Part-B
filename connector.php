<?php
$connector = mysqli_connect("webpagesdb.it.auth.gr:3306", "theathral1", "theathral1", "elearning");
if (!$connector) die("Couldn't connect to the database " . mysqli_error());