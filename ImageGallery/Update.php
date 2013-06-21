<?php

// Getting values fron form
$title = $_POST["title"];
$category_name = $_POST["select"];
$image_id = $_POST["id"];

// Connect to the database
include_once 'Connection.php';

// Blocking sql injection
$real_title = mysql_real_escape_string($title);
$real_category_name = mysql_real_escape_string($category_name);

//Server side validation
if (empty($real_title) || $real_category_name == "All Categories") {
    echo " Fill the fields";
    header('Location: Edit.php?id= ' . $image_id . '');
} else {

    $data = mysql_query("select * from category_tb 
                         where category_name='$real_category_name'");

// Fetching the data
    $info = mysql_fetch_array($data);
    $result = $info['category_id'];

//Update query
    $sql1 = mysql_query("update image_tb set title = '$real_title',
                   category_id='$result' WHERE  image_id='$image_id'");

//jump to Edit page
    header('Location: Edit.php?id= ' . $image_id . '');
}
?>
