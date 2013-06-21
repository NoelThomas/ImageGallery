<?php

session_start();
// Distroying the session
session_destroy();
// Jump to home page
header('Location: index.php');
?>
