<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Department of Computer Science - TA Management System</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
</head>
<body>
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
<h1>Attempting to delete course:</h1>
<?php
	require_once 'connectdb.php';
  require_once 'functions.php';
  require_once 'login_status.php';
  if(!$loggedin) header("Location: login.php");
  if(isset($_POST["courses"]))
  {
   	$whichCourse = $_POST["courses"];
    if ($whichCourse != null)
    {
    //First delete the assignedto rows containing the course.
    $query1 = 'delete from assignedto where coursenum="' . $whichCourse . '"';
    $result = query_database($connection, $query1);

    //Second delete the course.
    $query2 = 'delete from course where coursenum="' . $whichCourse . '"';
    $result = mysqli_query($connection, $query2);
    if ($result) 
    {
        echo "Course: '" . $whichCourse . "' was deleted!<br>";
    }
    else
    {
    	die("Error: deletion failed: " . mysqli_error($connection));
    }
   	mysqli_close($connection);
   }
   else echo "Error: Could not delete course.";
 }
 else echo "Error: Could not delete course.";
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
