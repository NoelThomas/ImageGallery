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
        <title>Image Gallery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
            <link href="css/lightbox.css" rel="stylesheet" />
            <script src="js/jquery-1.7.2.min.js"></script>
            <script src="js/lightbox.js"></script>
            <script type="text/javascript" src="Validation1.js"></script>
    </head>
    <body>
        <div class="shell">
            
            <div id="header">
                
                <div id ="log">
                <p><a id="pages" href="Logout.php">Logout</a></p>
            </div>
                
                <div id="navigation">
                    <ul id="sortable">
                        <li><a href="UserHome.php"><span> Home </span></a></li>
                        <li><a href="#"><span>Contact Me</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                    </ul>
                </div>
                
                <div class="cl">&nbsp;</div>
            </div>
            
            <div id="content" height="600px">
                <table></table>
                <form method="post" action="Update.php" onsubmit="return check_update()">

                    <?php
                    $image_id = $_GET['id'];

                    include_once 'Connection.php';

                    $data = mysql_query("SELECT *
                    FROM image_tb i
                    JOIN category_tb c ON i.category_id = c.category_id
                    where image_id='$image_id'");

                    $info = mysql_fetch_array($data);
                    echo'<div id= "edit"><a href="/ImageGallery/images/' . $info['image'] . '" rel="lightbox[roadtrip]" class="big-image">
                         <img src="/ImageGallery/images/' . $info['image'] . '" width="259px" height="194px"></a></div>
                         <table><tr><td>Title:</td><td><input type=txt name="title" id="title"value="' . $info['title'] . '"></td>
                         <td><span id="errortitle" class="formError"></span></td></tr>
                         <tr><td>Category Name:</td><td><input type=txt name="category" id="category" value="' . $info['category_name'] . '"disabled></td>
                         ';
                    ?>
                    
                    <td></td><td><select name="select">
                                        <?php
                                        include_once 'DropDown.php';
                                        ?>                           
                                    </select></td></tr>
                                    <tr><td colspan="2"><span id="errorcategory" class="formError"></span></td></tr>
                    <tr><td><input type="submit" name="Submit" value="Save" /></td></tr>
                    </table>
                    <input type="hidden" name="id" value="<?php echo $image_id; ?> " />
                </form>
            </div>

        </div>
        
        <div id="footer">
            <p class="lf">Copyright &copy; 2013 <a href="#">Image Gallery</a> - All Rights Reserved</p>
            <p class="rf"><a href="#">Image Gallery for everyone</a> by <a href="#">Noel.com</a></p>
            <div style="clear:both;"></div>
        </div>
    </body>
</html>