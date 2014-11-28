<?php

function get_profs($value, $connection)
{
 $query = "select * from prof";
 $result = mysqli_query($connection,$query);
 if (!$result) {
  die("databases query failed.");
}
echo "Select a Professor:<br/>";

echo '<select name="professors">';
while ($row = mysqli_fetch_assoc($result)) {

  echo '<option value="' . $row[$value] . '">' . $row["firstname"] . " " . $row["lastname"] . '</option>';
}

echo '</select><br/>';

mysqli_free_result($result);
}

?>