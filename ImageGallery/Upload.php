<?php

session_start();
$name = $_SESSION['username'];

//Connect to the database
include_once 'Connection.php';

//This is the directory where images will be saved 
$target = "images/";
$target = $target . basename($_FILES['photo']['name']);

//This gets all the other information from the form 
$title = $_POST['title'];
$category_name = $_POST['select'];
$pic = ($_FILES['photo']['name']);

if($title==''||$category_name==''||$pic==''){
echo 'Fill the fields';
}

 else {
//fetching the user id
$user_id = mysql_query("select user_id from user_tb where user_name='$name'");
$user = mysql_fetch_array($user_id);
$real_id = $user['user_id'];

//fetching the category id
$category_id = mysql_query("select category_id from category_tb where category_name='$category_name'");
$category = mysql_fetch_array($category_id);
$real_category = $category['category_id'];

//Writes the information to the database 
mysql_query("INSERT INTO image_tb (user_id,title,category_id,image) VALUES ('$real_id','$title','$real_category','$pic')");

//Writes the photo to the server 
if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
    //if its all ok 
    echo "The file " . basename($_FILES['uploadedfile']['name']) . " has been uploaded, and your information has been added to the directory";
    header('Location: UserHome.php');

} else {

    //Gives an error if its not 
    echo "Sorry, there was a problem uploading your file.";
    include 'UserHome.php';
    exit();
}
}

?>
