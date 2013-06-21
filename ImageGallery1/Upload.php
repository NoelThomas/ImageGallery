<?php

session_start();
$name = $_SESSION['username'];

// Connect to the database
include_once 'Connection.php';

//This is the directory where images will be saved 
$target = "images/";
$target = $target . basename($_FILES['photo']['name']);

// This gets all the other information from the form 
$title = mysql_real_escape_string($_POST['title']);
$category_name = mysql_real_escape_string($_POST['select']);
$pic = ($_FILES['photo']['name']);

if (($_FILES['photo']['type'] != 'image/jpeg')&& ($_FILES['photo']['type'] != 'image/gif') && ($_FILES['photo']['type'] != 'image/png') && ($_FILES['photo']['type'] != 'image/bmp') && ($_FILES['photo']['type'] != 'image/jpg'))
{
$server_message = 'Not an Image';
header('Location: UserHome.php?server=' . $server_message . '');
}

// Server side validations
if ($title == '' || $category_name == '') {
    $server_message = 'Fill the fields';
    header('Location: UserHome.php?server=' . $server_message . '');
} else {
// Fetching the user id
    $data = mysql_query("select user_id from user_tb where user_name='$name'");
    $user = mysql_fetch_array($data);
    $user_id = $user['user_id'];

// Fetching the category id
    $data_one = mysql_query("select category_id from category_tb where category_name='$category_name'");
    $category = mysql_fetch_array($data_one);
    $category_id = $category['category_id'];

// Writes the information to the database 
    mysql_query("INSERT INTO image_tb (user_id,title,category_id,image) VALUES ('$user_id','$title','$category_id','$pic')");

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
