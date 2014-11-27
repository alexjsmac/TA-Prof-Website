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

echo "Select a Term: &nbsp&nbsp";
echo '<select name="term">' .
'<option value="Fall">Fall</option>' .
'<option value="Winter">Winter</option>' .
'</select>';
echo '<br/>';

echo "Select a Year: &nbsp&nbsp";
echo '<select name="year">';
for ($year=2000; $year <= 2020; $year++)
{
  echo '<option value="' . $year . '">' . $year . '</option>';
}
echo '</select>';
echo '<br/>';

mysqli_free_result($result);

?>