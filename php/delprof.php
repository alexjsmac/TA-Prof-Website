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
    require_once 'login_status.php';
    if(!$loggedin) header("Location: login.php");
?>
<div class="container">
<nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <a href = "admin.php" type="button" class="btn btn-success navbar-btn navbar-left">Back</a>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
<h1>Attempting to delete professor:</h1>
<?php
if(isset($_POST["professors"]))
  {
    $userid = $_POST["professors"];
    if ($userid != null)
    {
    $query1 = 'select userid from ta where headid = "' . $userid . '"';
    $result = mysqli_query($connection, $query1);
    if (!$result) {
        die("Error: delete failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result)>0)
    {
    	echo "Professor is a head supervisor. Either remove the student(s) or change his/her Head Supervisor.";
    }

    $query2 = 'select studentid from cosupervises where superid="' . $userid . '"';
    $result = mysqli_query($connection, $query2);
    if (!$result) {
        die("Error: delete failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result)>0)
    {
        echo "Professor is a co-supervisor. Either remove the student(s) or change his/her Head Supervisor.";
    }

    else
    {
    	$query3 = 'delete from prof where userid=\'' . $userid . '\'';
    	if (!mysqli_query($connection, $query3)) {
        	die("Error: delete failed: " . mysqli_error($connection));
    	}
    	echo "Professor with user ID '" . $userid . "' was deleted!";
    }
    mysqli_close($connection);
}
else echo "Error: Professor could not be removed.";
}
else echo "Error: Professor could not be removed.";
?>
<div id="fix-for-navbar-spacing" style="height: 42px;">&nbsp;</div>
    <div class = "navbar navbar-default navbar-fixed-bottom">
      <div class = "container">
        <p class = "navbar-text">CS3319A Assignment 3 - Created By Alex MacLean and William Callaghan</p>
      </div>
    </div>
</div>
</body>
</html>