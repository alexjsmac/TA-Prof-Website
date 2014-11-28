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
<h1>Attempting to delete TA:</h1>
<?php
	require_once 'connectdb.php';
  require_once 'functions.php';
  require_once 'login_status.php';
  if(!$loggedin) header("Location: login.php");
  if(isset($_POST["TAs"]) && isset($_POST["term"]) && isset($_POST["year"]))
  {
   	$whichTA = $_POST["TAs"];
    $whichYear = $_POST["year"];
    $whichTerm = $_POST["term"];

    if ($whichTA != null && $whichYear != null && $whichTerm != null)
    {
      $query = 'select studentid from assignedto where studentid="' . $whichTA . '" and year="' . $whichYear . '" and term="' . $whichTerm . '"';
      $result = query_database($connection, $query);
      if (mysqli_num_rows($result)==0)
      {
        die("TA does not TA this course during the specified term and year.");
      }

    //Second delete the courses the ta are assigned to.
    $query = 'delete from assignedto where studentid="' . $whichTA . '" and year="' . $whichYear . '" and term="' . $whichTerm . '"';
    $result = query_database($connection, $query);

    if ($result) 
    {
        echo "TA with user ID '" . $whichTA . "' was removed from course!<br>";
    }
    else
    {
    	die("Error: Deletion failed: " . mysqli_error($connection));
    }
   	mysqli_close($connection);
   }
   else echo "Error: TA was not deleted from course.";
   }
   else echo "Error: TA was not deleted from course.";
?>
<div id="fix-for-navbar-spacing" style="height: 42px;">&nbsp;</div>
    <div class = "navbar navbar-default navbar-fixed-bottom">
      <div class = "container">
        <p class = "navbar-text">CS3319A Assignment 3 - Created By Alex MacLean and William Callaghan</p>
      </div>
    </div>
</div>
</div>
</body>
</html>
