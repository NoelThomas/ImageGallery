<?php

// Calling the connection
include_once 'Connection.php';

$data = mysql_query("SELECT * FROM image_tb i
                    JOIN category_tb c ON i.category_id = c.category_id
                    where image_id='$image_id'")or die(mysql_error());
// Fetching the data
$info = mysql_fetch_array($data);
$category_name = $info['category_name'];

echo'<div id= "edit"><a href="/ImageGallery/images/' . $info['image'] . '" rel="lightbox[roadtrip]" class="big-image">
     <img src="/ImageGallery/images/' . $info['image'] . '" width="259px" height="194px"></a></div>
     <table><tr><td>Title:</td><td><input type=txt name="title" id="title"value="' . $info['title'] . '"></td>
     <td><span id="errortitle" class="formError"></span></td></tr>
     <tr><td>Category Name:</td> ';
?>
