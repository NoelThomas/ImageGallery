<?php

$flag = 2;
$title1 = $_POST["title"];
$category_name= $_POST["select"];
header('Location: index.php?flag= ' . $flag . '&title1='.$title1.'&category_name='.$category_name.'');
exit();

?>
