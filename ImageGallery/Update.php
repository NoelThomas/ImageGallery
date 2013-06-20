<?php
$title = $_POST["title"];
$category_name = $_POST["category"];
$image_id=$_POST["id"];

// Connect to the database
include_once 'Connection.php';

$name = mysql_real_escape_string($title);
$password = mysql_real_escape_string($category_name);

if (empty($name) && empty($password)) //This is the way to check validations using PHP code but here we are using JS validations so it is not necessary
 {
 echo " Fill ";
 include 'UserHome.php';
 exit();
 }
 else {
     

$data= mysql_query("select * from category_tb where category_name='$password'");

$info = mysql_fetch_array($data);

$result= $info['category_id'];

$sql1=mysql_query("update image_tb set title = '$name',
category_id='$result' WHERE  image_id='$image_id '");
include 'UserHome.php';
 }
?>
