<?php
$query = "select distinct coursenum from assignedto order by coursenum";
$result = mysqli_query($connection,$query);
if (!$result) {
  die("databases query failed.");
}


echo "Select a Course: &nbsp&nbsp";
echo '<select name="courses">';
while ($row = mysqli_fetch_assoc($result))
{
  echo '<option value="' . $row["coursenum"] . '">' . $row["coursenum"] . '</option>';
}
echo '</select>';
echo '<br/>';

mysqli_free_result($result);

?>