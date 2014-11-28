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
  <?php
  include 'connectdb.php';
  require_once 'functions.php';
  require_once 'login_status.php';
  //If not logged in, redirect to login page.
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
    <h1>Attempting to add a new course:</h1>
      <?php
      if(isset($_POST["coursename"]) && isset($_POST["coursenum"]))
      {
       $coursename = $_POST["coursename"];
       $coursenum =$_POST["coursenum"];
       if ($coursename != null && $coursenum != null)
       {
        $query1 = 'select coursenum from course where coursenum="' . $coursename . '"';
        $result = query_database($connection, $query1);

        if (mysqli_num_rows($result)>0)
        {
          echo "Course already exists.";
        }
        else
        {
          $query = 'insert into course values("' . $coursenum . '", "' . $coursename . '")';
          if (!mysqli_query($connection, $query)) {
          die("Error: Insert failed: " . mysqli_error($connection));
        }
        echo "New course was added!";
        mysqli_close($connection);
        }
      }
      else
      {
        echo "Error: Course was not added. Form was incomplete.";
      }
    }
    else
      echo "Error: Course was not added. Form was incomplete.";
      ?>
  </div>
  <div id="fix-for-navbar-spacing" style="height: 42px;">&nbsp;</div>
    <div class = "navbar navbar-default navbar-fixed-bottom">
      <div class = "container">
        <p class = "navbar-text">CS3319A Assignment 3 - Created By Alex MacLean and William Callaghan</p>
      </div>
    </div>
</body>
</html>