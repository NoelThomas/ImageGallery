<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: UserHome.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>PhotoWall</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.1.css" type="text/css" media="all" />
        <script src="js/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery-ui-1.8.5.custom.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/fancybox/jquery.fancybox-1.3.1.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/fancybox/jquery.mousewheel-3.0.2.pack.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/js-func.js" type="text/javascript" charset="utf-8"></script>
        <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
        <script type="text/javascript" src="Validation1.js"></script>
    </head>
    <body>
        <!-- START PAGE SOURCE -->
        <div id="login">
            <h3>Login here!</h3>
            <form method="post" action="Login.php" onsubmit="return check_login()">
                <table>
                    <tr>
                        <td> <label for="users_email">User Name</label></td>
                        <td><input type="text" 
                                   name="users_email" id="users_email"> </td>
                        <td><span id="errorname" class="formError"></span></td>
                    </tr>
                    <tr>
                        <td> <label for="users_pass">Password</label></td>
                        <td><input name="users_pass" 
                                   type="password" id="users_pass"></input></td>
                        <td><span id="errorpassword" class="formError"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit" />
                            <input type="reset" value="Reset"/></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="shell">
            <div id="header">
                <div id="navigation">
                    <ul id="sortable">
                        <li><a href="index.php"><span>Home</span></a></li>
                        <li><a href="#"><span>Category</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                        <li><a href="#"><span>Random Button</span></a></li>
                    </ul>

                </div>
                <div class="cl">&nbsp;</div>


                <div id="dropdown">

                    <form method="post" action="Category.php">
                        <table>
                            <tr>
                                <td>
                                    <select name="select">
                                        <?php
                                        include_once 'DropDown.php';
                                        ?>                           
                                    </select></td>
                                <td>  <input type="submit" name="Submit" value="Select" /></td></tr>
                        </table>
                    </form>
                </div>
                <div id="search">
                    <form method="post" action="Search.php" onsubmit="return check_search()" >
                        <table>
                            <tr><td>
                                    <input type="text" 
                                           name="title" id="title" placeholder="Search"></td>
                                <td><input type="submit" value="Submit" /></td> </tr>
                            <td><span id="errortitle" class="formError"></span></td> 
                        </table>
                    </form>
                </div>

                <div class="cl">&nbsp;</div>
            </div>
            <div id="main">

                <?php
                if ($flag == 1) {
                    include_once 'CategoryName.php';
                }
                if ($flag == 2) {
                    include_once 'Title.php';
                }
                if ($flag == 0) {
                    include_once 'Gallery.php';
                }
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

