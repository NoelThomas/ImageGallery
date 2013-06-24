<?php

try {
// Connecting to database
    $con = mysql_connect("localhost", "root", "root");
// Select the database to use
    mysql_select_db("image_gallery", $con);
} catch (Exception $e) {
    echo ('An error has occured');
}
?>
