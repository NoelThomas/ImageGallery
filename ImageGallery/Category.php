<?php
 $flag=1;
 $category_name= $_POST["select"];
 if($category_name=="Select"||$category_name=="None")
 {
     $flag=0;  
 }
 include_once 'index.php';
exit();
?>
