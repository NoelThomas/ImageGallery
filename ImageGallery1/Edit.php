<?php
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <link href="css/lightbox.css" rel="stylesheet" />
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/lightbox.js"></script>
    </head>
    <body>
        <form method="post" action="Update.php">
            
        
<?php
$image_id= $_GET['id'];

include_once 'Connection.php';
$data = mysql_query("SELECT *
FROM image_tb i
JOIN category_tb c ON i.category_id = c.category_id
where image_id='$image_id'");

$info = mysql_fetch_array($data);
echo'<div><a href="http://localhost/ImageGallery/images/' . $info['image'] . '" rel="lightbox[roadtrip]" class="big-image">
        <img src="http://localhost/ImageGallery/images/' . $info['image'] . '"></a> </div>
        <p class="photo-name">Title:<input type=txt name="title" id="title"value="' . $info['title'] . '"></br>
            Category Name:<input type=txt name="category" id="category" value="' . $info['category_name'] .'"></br>';
?>
            <input type="hidden" name="id" value="<?php echo $image_id; ?> " />
            <input type="submit" name="Submit" value="Save" />
            </form>
</body>
    </html>