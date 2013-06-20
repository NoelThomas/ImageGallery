<?php
$flag=2;
$limit = 8;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

include_once 'Connection.php';
$title1=$_GET['title1'];
$category_name=$_GET['category_name'];

if($category_name == 'All Categories')
{
    $data = mysql_query("select * from image_tb i 
                    join category_tb c on i.category_id=c.category_id
                    JOIN user_tb u ON i.user_id = u.user_id
                    where title LIKE '%$title1%' ORDER BY title ASC") or die(mysql_error());
}

else
{
$data = mysql_query("select * from image_tb i 
                    join category_tb c on i.category_id=c.category_id
                    JOIN user_tb u ON i.user_id = u.user_id
                    where title LIKE'%$title1%' and category_name = '$category_name' ORDER BY title ASC") or die(mysql_error());
}

while ($info = mysql_fetch_array($data)) {
    echo'<div class="image-box">
         <div class="holder"> <span class="drag-pointer">&nbsp;</span>
         <div class="photo-cover"> <a href="http://localhost/ImageGallery/images/' . $info['image'] . '" rel="lightbox[roadtrip]" class="big-image">
         <img src="http://localhost/ImageGallery/images/' . $info['image'] . '" width="169" height="110"></a> </div>
         <p class="photo-name">Title:' . $info['title'] . '</br> Category Name:' . $info['category_name'] . '</br> Name:' . $info['first_name'] . '</p>
         </div>
         </div>';
}

$sql = "SELECT * FROM image_tb";
$rs_result = mysql_query($sql);
$total_records = mysql_num_rows($rs_result);
$total_pages = ceil($total_records / $limit);
$pagLink = "<div class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<a id='pages' href='index.php?page=" . $i . "&flag=".$flag."'>" . $i . "</a>";
};
echo $pagLink . "</div>";

?>
