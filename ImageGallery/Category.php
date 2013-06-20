<?php
 $flag=1;
 $category_name1= $_POST["select"];
 if($category_name1=="Select"||$category_name1=="None")
 {
     $flag=0;  
 }
 include_once 'index.php';
exit();
?>
