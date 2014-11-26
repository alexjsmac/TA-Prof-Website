<?php
   $query = "select * from course";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Select a Course:<br/><br/>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="courses" checked = "true" value="';
        echo $row["coursenum"];
        echo '">' . " " . $row["coursenum"] . " " . $row["coursename"] . "<br>";
   }
   mysqli_free_result($result);
?>