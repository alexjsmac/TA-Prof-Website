<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CS3319 Assignment 3</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Attempting to delete TA:</h1>
<ol>
<?php
   $userid = $_POST["userid"];
   $query = 'delete from ta where userid=\'' . $userid . '\'';
   $result = mysqli_query($connection, $query1);
   if (!mysqli_query($connection, $result)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "TA was deleted!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>