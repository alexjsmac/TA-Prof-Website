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
<h1>Attempting to add new TA:</h1>
<ol>
<?php
   $firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $studentnum = $_POST["studentnum"];
   $userid = $_POST["userid"];
   $type = $_POST["type"];
   $query = 'insert into ta (firstname, lastname, studentnum, userid, type) values (\'' . $firstname . '\',\'' .  $lastname . '\',\'' . $studentnum . '\',\'' . $userid . '\',\'' . $type . '\')';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "New TA was added!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>