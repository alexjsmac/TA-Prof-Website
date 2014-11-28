<?php

function get_tas($value, $connection)
{
   $query = "select * from ta";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a TA:<br/>";

echo '<select name="TAs">';
while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row[$value] . '">' . $row["firstname"] . " " . $row["lastname"] . '</option>';
   }
   echo '</select><br/>';


   mysqli_free_result($result);
}
?>