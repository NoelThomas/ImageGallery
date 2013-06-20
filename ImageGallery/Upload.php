<?php
session_start();
include_once 'Connection.php';
$name=$_SESSION['username'];
 //This is the directory where images will be saved 
 $target = "images/"; 
 $target = $target . basename( $_FILES['photo']['name']); 
 
 //This gets all the other information from the form 
 $name=$_POST['title']; 
 $password=$_POST['category_name']; 
 $pic=($_FILES['photo']['name']); 
 
   // Connect to the database
 
$user_id=mysql_query("select user_id from user_tb where user_name='$name'");
$user = mysql_fetch_array( $user_id );
$real_id=$user['user_id'];

$category_id=mysql_query("select category_id from category_tb where category_name='$password'");
$category= mysql_fetch_array( $category_id );
$real_category = $category['category_id'];
//Writes the information to the database 
  mysql_query("INSERT INTO image_tb (user_id,title,category_id,image) VALUES ('$real_id','$name','$real_category','$pic')");
// mysql_query("INSERT INTO `employees` VALUES ('$name', '$email', '$phone', '$pic')") ; 
 
 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
 {
 //Tells you if its all ok 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory";
 include 'UserHome.php';
 exit();
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 include 'UserHome.php';
 exit();
 } 
?>
