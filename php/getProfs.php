<?php
   $query = "select * from prof";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a Professor:<br/>";
   //while ($row = mysqli_fetch_assoc($result)) {
        //echo '<input type="radio" name="professors" checked = "true" value="';
        //echo $row["userid"];
        //echo '">' . " " . $row["firstname"] . " " . $row["lastname"] . "<br>";
   //}

echo '<select name="professors">';
while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row["userid"] . '">' . $row["firstname"] . " " . $row["lastname"] . '</option>';
   }
   echo '</select><br/>';

   mysqli_free_result($result);
?>