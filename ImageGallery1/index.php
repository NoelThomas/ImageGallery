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
        <div class="shell">
            <div id="header">
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
                <div id="dropdown">
                <form method="post" action="Category.php">
                    <select name="select">
                    <?php
                    include_once 'DropDown.php';
?>
                    <input type="submit" name="Submit" value="Select" />
                    </select>
                    </form>
                    </div>
                <div id="search">
                <form method="post" action="Search.php" >
                    <input type="text" 
                                   name="title" id="title" placeholder="Search"> <span id="errorSearch" class="formError"></span>

                            <input type="submit" value="Submit" />
                </form>
                    </div>
                <form method="post" action="Login.php" onsubmit="return checkForm()">
                    <div border="1" >
                        <div>
                            <label for="users_email">Email</label>
                            <input type="text" 
                                   name="users_email" id="users_email"> <span id="errorName" class="formError"></span>
                        </div>
                        <div>
                            <label for="users_pass">Password</label>
                            <input name="users_pass" 
                                   type="password" id="users_pass"></input> <span id="errorpassword" class="formError"></span>
                        </div>
                        <div>
                            <input type="submit" value="Submit" />
                            <input type="reset" value="Reset"/>
                        </div>
                    </div>
                </form>
                
                <div class="cl">&nbsp;</div>
            </div>
            <div id="main">

                <div id="chvchvcbv">
                    
                    <?php
                    if($flag==1)
                    {
                        include_once 'CategoryName.php';
                    }
                    if($flag==2)
                    {
                        include_once 'Title.php';
                    }
                   if($flag==0) 
                   {
                    include_once 'Gallery.php';
                   }
                    ?>
                    
                </div>
                
                                       <div id="sdsd">
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

