<?php

// User submitted information
$name = $_POST["users_email"];
$password = $_POST["users_pass"];

// Connect to the database
include_once 'Connection.php';

// Blocking sql injection
$myusername = mysql_real_escape_string($name);
$mypassword = mysql_real_escape_string($password);

// Checking validations using PHP code
if (empty($name) && empty($password)) {
    echo " Please fill the fields ";
    include 'index.php';
    exit();
}

$sql = "SELECT user_name,user_password FROM user_tb 
        WHERE user_name='$myusername' and user_password='$mypassword'"
        or die(mysql_error());

$result = mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if ($count == 1) {
    session_start();
// Register $myusername, $mypassword and redirect to file "login_success.php"
    $_SESSION['username'] = $myusername;
// Jump to secured page
    header('Location: UserHome.php');
} else {
// Jump to login page
    $error = 'Invalid user name or password';
    header('Location: index.php?error=' . $error . '');
}
?>
