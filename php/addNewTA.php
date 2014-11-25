<?php
include 'functions.php'
$query = "select * from ta";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo $row["species"] . "</li>";
}
mysqli_free_result($result);
echo "</ol>";
?>