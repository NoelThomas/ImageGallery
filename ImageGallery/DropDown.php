<?php

// Calling the connection
include_once 'Connection.php';

$query = "SELECT * FROM category_tb ORDER BY category_id";

try {

    mysql_query($query, $con);
} catch (Exception $e) {
    echo "There is a technical problem";
}

$result = mysql_query($query);

// Setting the optionsto dropdown
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
