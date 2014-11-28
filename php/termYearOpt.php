<?php

function select_term()
{
echo "Select a Term: &nbsp&nbsp";
echo '<select name="term">' .
'<option value="Fall">Fall</option>' .
'<option value="Spring">Spring</option>' .
'<option value="Summer">Summer</option>' .
'</select>';
echo '<br/>';
}

function select_year()
{
echo "Select a Year: &nbsp&nbsp";
echo '<select name="year">';
for ($year=2000; $year <= 2020; $year++)
{
  echo '<option value="' . $year . '">' . $year . '</option>';
}
echo '</select>';
echo '<br/>';
}

?>