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
<h1>Attempting to assign TA to professor:</h1>
<ol>
<?php
    $ta = $_POST["TAs"];
    $prof = $_POST["professors"];
    $supervisor = $_POST["supervisor"];
    if (strcmp($supervisor, "head") == 0)
    {
      $query = 'update ta set headid=\'' . $prof . '\' where userid = \'' . $ta . '\'';
      if (!mysqli_query($connection, $query)) 
      {
        die("Error: assignment failed" . mysqli_error($connection));
      }
      echo "TA assigned a Head Supervisor!" . $ta . $prof . $supervisor;
    }
    else
    {
      $query = 'insert into cosupervises (studentid, superid) values (\'' . $ta . '\',\'' .  $prof . '\')';
      if (!mysqli_query($connection, $query)) {
        die("Error: assignment failed" . mysqli_error($connection));
      }
      echo "TA assigned a co Supervisor!";
    }
    mysqli_close($connection);
  ?>
</ol>
</div>
</body>
</html>