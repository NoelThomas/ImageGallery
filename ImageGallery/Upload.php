<?php

session_start();
$name = $_SESSION['username'];

$valid_mime_types = array(
    'gif',
    'png',
    'jpeg',
    'pjpeg',
    'jpg',
);

// Connect to the database
include_once 'Connection.php';

//This is the directory where images will be saved 
$title = mysql_real_escape_string($_POST['title']);
$category_name = mysql_real_escape_string($_POST['select']);
$pic = ($_FILES['photo']['name']);
$target = "images/";
$image_ext = strtolower(end(explode('.', $pic)));
$image_new_name = time() . '.' . $image_ext;
$target = $target . $image_new_name;

if (!in_array($image_ext, $valid_mime_types)) {
    $server_message = 'Not an Image';
    header('Location: UserHome.php?server_message=' . $server_message . '');
    exit();
}
// Server side validations
if ($title == '' || $category_name == 'All Categories') {
    $server_message = 'Fill the fields';
    header('Location: UserHome.php?server_message=' . $server_message . '');
} else {
// Fetching the user id
    $data = mysql_query("select user_id from user_tb where user_name='$name'");
    $user = mysql_fetch_array($data);
    $user_id = $user['user_id'];

// Fetching the category id
    $data_one = mysql_query("select category_id from category_tb where category_name='$category_name'") or die(mysql_error());

    $category = mysql_fetch_array($data_one);
    $category_id = $category['category_id'];

// Writes the information to the database 
    mysql_query("INSERT INTO image_tb (user_id,title,category_id,image) VALUES ('$user_id','$title','$category_id','$image_new_name ')") or die(mysql_error());

// Writes the photo to the server 
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
        // If its all ok 
        $server_message = "Success";
        header('Location:Success.php');
    } else {

        // Gives an error if any 
        $server_message = "Sorry, there was a problem uploading your file.";
        header('Location: UserHome.php?server_message=' . $server_message . '');
    }
}
?>
