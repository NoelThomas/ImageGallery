<?php

// Connecting to database
$con = mysql_connect("localhost", "root", "root");

// Make sure we connected succesfully
if (!$con) {
    die('Connection Failed' . mysql_error());
}

// Select the database to use
mysql_select_db("image_gallery", $con);

?>
