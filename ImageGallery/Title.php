<?php

include_once 'Connection.php';
$data = mysql_query("select * from image_tb i 
     join category_tb c on i.category_id=c.category_id
     where title='$title1'ORDER BY title ASC") or die(mysql_error());

while ($info = mysql_fetch_array($data)) {
    echo'<div class="image-box">
         <div class="holder"> <span class="drag-pointer">&nbsp;</span>
         <div class="photo-cover"> <a href="http://localhost/ImageGallery/images/' . $info['image'] . '" rel="lightbox[roadtrip]" class="big-image">
         <img src="http://localhost/ImageGallery/images/' . $info['image'] . '" width="169" height="110"></a> </div>
         <p class="photo-name">Title:' . $info['title'] . '</br> Category Name:' . $info['category_name'] . '</br> Name:' . $info['first_name'] . '</p>
         </div>
         </div>';
}

?>
