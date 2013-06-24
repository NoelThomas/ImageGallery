<?php

// Check, if username session is NOT set then this page will jump to login page
$flag=0;
// Setting the limit of images per page
$limit = 8;

//checking whether the url contains page number
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};

$start_from = ($page - 1) * $limit;


// Calling the connection
    include_once 'Connection.php';
    
    $data = mysql_query("SELECT * FROM image_tb i
                         JOIN category_tb c ON i.category_id = c.category_id
                         JOIN user_tb u ON i.user_id = u.user_id ORDER BY image_id 
                         DESC LIMIT $start_from, $limit") or die(mysql_error());

// Fetching the data
    while ($info = mysql_fetch_array($data)) {
    echo'<div class="image-box">
         <div class="holder">
         <div class="photo-cover"> <a href="/ImageGallery/images/' . $info['image'] . '"rel="lightbox" >
         <img src="/ImageGallery/images/' . $info['image'] . '" width="169" height="110"></a> </div>
         <p class="photo-name">Title:' . $info['title'] . '</br>
         Category Name:' . $info['category_name'] . '</br> Name:' . $info['first_name'] . '</p>
         </div>
         </div>';
}

// Query for pagination
$sql = "SELECT * FROM image_tb" or die(mysql_error());
$rs_result = mysql_query($sql);
$total_records = mysql_num_rows($rs_result);
$total_pages = ceil($total_records / $limit);

// Setting the page link
$pagLink = "<div class='pagination'>";

for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<a id='pages' href='index.php?page=" . $i . "'>" . $i . "</a>";
};

echo $pagLink . "</div>";
  








