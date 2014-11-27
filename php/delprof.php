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
<h1>Attempting to delete professor:</h1>
<ol>
<?php
    $userid = $_POST["userid"];
    $query1 = 'select userid from ta where headid = "' . $userid . '"';
    $result = mysqli_query($connection, $query1);
    if (!$result) {
        die("Error: delete failed" . mysqli_error($connection));
    }

    if (mysqli_num_rows($result)>0)
    {
    	echo "Professor is a head supervisor. Either remove the student or change his/her Head Supervisor.";
    }

    else
    {
    	$query2 = 'delete from prof where userid=\'' . $userid . '\'';
    	if (!mysqli_query($connection, $query2)) {
        	die("Error: delete failed" . mysqli_error($connection));
    	}
    	echo "Professor was deleted!";
    }
    mysqli_close($connection);
?>
</ol>
</body>
</html>