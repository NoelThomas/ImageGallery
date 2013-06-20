<?php

include_once 'Connection.php';

$query = "SELECT * FROM category_tb
          ORDER BY category_id";

$result = mysql_query($query);

echo '<option>All Categories</option>';

while ($row_list = mysql_fetch_assoc($result)) {

    $title = $row_list['category_name'];

    echo "<option";
    if ($title == $category_name) {
        echo " selected='selected'";
    } echo ">$title</option>";
}
?>
