<?php

$title = $_POST["title"];
$category_name = $_POST["select"];
$image_id = $_POST["id"];

// Connect to the database
include_once 'Connection.php';

$real_title = mysql_real_escape_string($title);
$real_category_name = mysql_real_escape_string($category_name);

if (empty($real_title) && empty($real_category_name)) {
    echo " Fill ";
    header('Location: Edit.php?id= ' . $image_id . '');
} else {
    $data = mysql_query("select * from category_tb where category_name='$real_category_name'");

    $info = mysql_fetch_array($data);
    $result = $info['category_id'];

    $sql1 = mysql_query("update image_tb set title = '$real_title',
                   category_id='$result' WHERE  image_id='$image_id '");
    $count = mysql_num_rows($sql1);

// If result matched $myusername and $mypassword, table row must be 1 row
    echo 'Success';

    header('Location: Edit.php?id= ' . $image_id . '');

}
?>
