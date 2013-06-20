<?php

// User submitted information
$name = $_POST["users_email"];
$password = $_POST["users_pass"];
$errormessage = array();

// Connect to the database
include_once 'Connection.php';

$myusername = mysql_real_escape_string($name);
$mypassword = mysql_real_escape_string($password);

if (empty($name) && empty($password)) //This is the way to check validations using PHP code but here we are using JS validations so it is not necessary
 {
 echo " Please fill the fields ";
 include 'index.php';
 exit();
 }

$sql="SELECT user_name,user_password FROM user_tb WHERE user_name='$myusername' and user_password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

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
    echo'<span id="errorserver" class="formError">Invalid user name or password</span>';
    include ('index.php');
    exit();
}

?>
