<?php
   $query = "select * from ta";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a TA:<br/>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="TAs" checked = "true" value="';
        echo $row["userid"];
        echo '">' . " " . $row["firstname"] . " " . $row["lastname"] . "<br>";
   }
   mysqli_free_result($result);
?>