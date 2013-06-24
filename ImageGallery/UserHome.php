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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
         <link href="css/lightbox.css" rel="stylesheet" />
            <script src="js/jquery-1.7.2.min.js"></script>
            <script src="js/lightbox.js"></script>
        <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
        <script type="text/javascript" src="Validation1.js"></script>
    </head>
    <body>
        <!-- START PAGE SOURCE -->
        <div class="shell">

            <div id="header">

                <div id="log">
                    <p><a id="pages" href="Logout.php">Logout</a></p>
                </div>

                <div id="navigation">
                    <ul id="sortable">
                        <li><a href="UserHome.php"><span>Home</span></a></li>
                    </ul>
                </div>

                <div class="cl">&nbsp;</div>

                <div id="upload">
                    <h3>Upload Images Here</h3>
                    <form enctype="multipart/form-data" action="Upload.php" method="POST" onsubmit="return check_upload()">
                            <table>
                                <tr>
                                    <td> Title:</td> <td><input type="text" name = "title"></td>
                                     <td><span id="errortitle" class="formError"></span></td>
                                </tr>
                                <tr>
                                    <td>Category Name:</td><td><select name="select">
                                            <?php
                                            include_once 'DropDown.php';
                                            ?>                           
                                        </select></td>
                                     <td><span id="errorcategory" class="formError"></span></td>
                                </tr>
                                <tr>
                                    <td>Photo:</td> <td><input type="file" name="photo" data-type="image"></td>
                                    <td><span id="errorimage" class="formError"></span></td>
                                </tr>
                                <?php
                                $server_message = $_GET['server_message'];
                                {
                                    echo'<tr><td colspan="2"><span id="errorimage" class="formError">' . $server_message . '</span></td></tr>';
                                }
                                ?>
                                <tr>
                                    <td>
                                        <input type="submit" value="Submit">
                                    </td>
                                </tr>
                            </table>
                    </form>
                </div>

                <div class="cl">&nbsp;</div>
            </div>

            <div id="main">

                <?php
                // Calling the Gallery page 
                include_once 'UserGallery.php';
                ?>  

            </div>

        </div>

        <div id="footer">
            <p class="lf">Copyright &copy; 2013 <a href="#">Image Gallery</a> - All Rights Reserved</p>
            <p class="rf"><a href="#">Image Gallery for everyone</a> by <a href="#">Noel.com</a></p>
            <div style="clear:both;"></div>
        </div>

        <!-- END PAGE SOURCE -->
    </body>
</html>

