<?php

// Calling the connection
include_once 'Connection.php';

$query = "SELECT * FROM category_tb ORDER BY category_id";

if (!mysql_query($query, $con)) {

    die('Error: ' . mysql_error());
}

$result = mysql_query($query);

// Setting the options
echo '<option>All Categories</option>';

// Fetching the values 
while ($row_list = mysql_fetch_assoc($result)) {

    $title = $row_list['category_name'];

    echo "<option";
    if ($title == $category_name) {
        echo " selected='selected'";
    } echo ">$title</option>";
}
?>
