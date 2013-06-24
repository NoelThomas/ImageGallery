<?php

// Checking whether search or not 
if ($flag == 0) {
// $flag=1 triggers search condition    
    $flag = 1;

// Getting values from form
    $title1 = mysql_real_escape_string($_POST["title"]);
    $category_name = mysql_real_escape_string($_POST["select"]);

    header('Location: index.php?flag= ' . $flag . '&title1=' . $title1 . '&category_name=' . $category_name . '');
}

// Limiting the number of images per page
$limit = 8;

// Checking whether url contains page number
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

// Calling the connection
include_once 'Connection.php';

// Getting values from url
$title1 = $_GET['title1'];
$category_name = $_GET['category_name'];

// Check condition for category select
if ($category_name == 'All Categories') {
    $data = mysql_query("select * from image_tb i 
                         join category_tb c on i.category_id=c.category_id
                         JOIN user_tb u ON i.user_id = u.user_id
                         where title LIKE '%$title1%' ORDER BY title ASC LIMIT $start_from, $limit")
                         or die(mysql_error());
} else {
// Filter search by category
    $data = mysql_query("select * from image_tb i 
                         join category_tb c on i.category_id=c.category_id
                         JOIN user_tb u ON i.user_id = u.user_id
                         where title LIKE'%$title1%' and category_name = '$category_name' ORDER BY title ASC LIMIT $start_from, $limit") 
                         or die(mysql_error());
}

//Fetching the data
while ($info = mysql_fetch_array($data)) {
    echo'<div class="image-box">
         <div class="holder"> <span class="drag-pointer">&nbsp;</span>
         <div class="photo-cover"> <a href="http://localhost/ImageGallery/images/' . $info['image'] . '" rel="lightbox[roadtrip]" class="big-image">
         <img src="/ImageGallery/images/' . $info['image'] . '" width="169" height="110"></a> </div>
         <p class="photo-name">Title:' . $info['title'] . '</br> Category Name:' . $info['category_name'] . '</br> Name:' . $info['first_name'] . '</p>
         </div>
         </div>';
}

// Check condition for category select in pagination
if ($category_name == 'All Categories') {
    $sql = "select * from image_tb i 
            join category_tb c on i.category_id=c.category_id
            JOIN user_tb u ON i.user_id = u.user_id
            where title LIKE '%$title1%'" or die(mysql_error());
} else {
    // Filter search by category in pagination
    $sql = "select * from image_tb i 
            join category_tb c on i.category_id=c.category_id
            JOIN user_tb u ON i.user_id = u.user_id
            where title LIKE '%$title1%' and category_name = '$category_name'"
            or die(mysql_error());
}

$rs_result = mysql_query($sql);
$total_records = mysql_num_rows($rs_result);
$total_pages = ceil($total_records / $limit);

// Pagination Links
$pagLink = "<div class='pagination'>";

for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<a id='pages' href='index.php?page=" . $i . "&flag=" . $flag . "&title1=" . $title1 . "&category_name=" . $category_name . "'>" . $i . "</a>";
};

echo $pagLink . "</div>";
?>
