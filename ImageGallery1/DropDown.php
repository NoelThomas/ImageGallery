<?php
include_once 'Connection.php';
$query = "SELECT *
          FROM category_tb
          ORDER BY category_id";

$result = mysql_query($query);

echo '<option>Select</option>';

while($row_list=  mysql_fetch_assoc($result)){

  $name =  $row_list['category_name'];

echo '<option value="'.$name.'">'.$name.'</option>';
}
echo '<option>None</option>';

?>
