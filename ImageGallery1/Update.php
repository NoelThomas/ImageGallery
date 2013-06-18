<?php
$title0 = $_POST["title"];
$category_name20 = $_POST["category"];
$image_id=$_POST["id"];

// Connect to the database
include_once 'Connection.php';

$title = mysql_real_escape_string($title0);
$category_name2 = mysql_real_escape_string($category_name20);

if (empty($title) && empty($category_name2)) //This is the way to check validations using PHP code but here we are using JS validations so it is not necessary
 {
 echo " Fill ";
 exit();
 }
 else {
     

$sql="select category_id from category_tb where category_name='$category_name2'";
$result=mysql_query($sql);

$sql1="update image_tb set title = '$title',
category_id='$result' WHERE  image_id='$image_id'";

echo $image_id."fhfghfgh";
echo $category_name2."gjghjghj";
        echo $result."fchfh";

 }
?>
