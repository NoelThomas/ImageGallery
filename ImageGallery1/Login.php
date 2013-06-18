<?php

// Grab User submitted information
$title = $_POST["users_email"];
$category_name2 = $_POST["users_pass"];


// Connect to the database
include_once 'Connection.php';

$myusername = mysql_real_escape_string($title);
$mypassword = mysql_real_escape_string($category_name2);

if (empty($title) && empty($category_name2)) //This is the way to check validations using PHP code but here we are using JS validations so it is not necessary
 {
 echo " Please enter the correct Username and Password ";
 include 'index.php';
 exit();
 }

$sql="SELECT user_name,user_password FROM user_tb WHERE user_name='$myusername' and user_password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
echo $count.'count';

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
session_start();
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['username'] = $myusername;
// Jump to secured page
header('Location: UserHome.php');
}
else {
// Jump to login page
header('Location: index.php');
}
?>
