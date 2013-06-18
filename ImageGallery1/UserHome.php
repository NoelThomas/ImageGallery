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
        <title>PhotoWall</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--        <link href="css/lightbox.css" rel="stylesheet" />-->
<!--        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/lightbox.js"></script>-->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.1.css" type="text/css" media="all" />
        <script src="js/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery-ui-1.8.5.custom.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/fancybox/jquery.fancybox-1.3.1.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/fancybox/jquery.mousewheel-3.0.2.pack.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/js-func.js" type="text/javascript" charset="utf-8"></script>
        <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
    </head>
    <body>
        <!-- START PAGE SOURCE -->
        <div class="shell">
            <div id="header">
                <div>
                    <p><a href="Logout.php">Logout</a></p>
                </div>
                <div id="navigation">
                    <ul id="sortable">
                        <li><a href="#"><span>About Me</span></a></li>
                        <li><a href="#"><span>Contact Me</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                    </ul>
                </div>
                <div class="cl">&nbsp;</div>
                <h3>Upload Images Here</h3>
                <div id="upload">
                    <form enctype="multipart/form-data" action="Upload.php" method="POST">
                        Title: <input type="text" name = "title"><br> 
                                Category Name: <input type="text" name = "category_name"><br> 
                                        Photo: <input type="file" name="photo"><br> 
                                                <input type="submit" value="Add"> 
                                                    </form>
                                                    </div>
                                                    <div class="cl">&nbsp;</div>

                                                    <div id="main">

                                                        <div id="chvchvcbv" width="600px">
                                                            <?php
                                                            include_once 'Gallery.php';
                                                            ?>  
                                                        </div>
                         <div id="footer">
                        <p class="lf">Copyright &copy; 2013 <a href="#">Image Gallery</a> - All Rights Reserved</p>
                        <p class="rf"><a href="#">Image Gallery for everyone</a> by <a href="#">Noel.com</a></p>
                        <div style="clear:both;"></div>
                    </div>

                                                        </div>
                                                    </div>
                                                    </div>
                                  

                                                        <!-- END PAGE SOURCE -->
                                                        </body>
                                                        </html>

