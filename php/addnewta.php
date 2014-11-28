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
   include 'upload_pic.php';
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
<h1>Attempting to add new TA:</h1>
<?php
  if((isset($_POST["firstname"])) && (isset($_POST["lastname"])) && (isset($_POST["studentnum"])) && (isset($_POST["userid"])))
  {
   $firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $studentnum = $_POST["studentnum"];
   $userid = $_POST["userid"];
   $type = $_POST["type"];
   $userpic = $_POST["file"];
   if ($firstname != null && $lastname != null && $studentnum != null && $userid != null && $type != null)
   {
   $query = 'insert into ta (firstname, lastname, studentnum, userid, type) values (\'' . $firstname . '\',\'' .  $lastname . '\',\'' . $studentnum . '\',\'' . $userid . '\',\'' . $type . '\')';
   if ($userpic != null)
   {
    $query = 'insert into ta (firstname, lastname, studentnum, userid, type, image) values (\'' . $firstname . '\',\'' .
      $lastname . '\',\'' . $studentnum . '\',\'' . $userid . '\',\'' . $type . '\',\'' . $userpic . '\')';
   }
   if (!mysqli_query($connection, $query)) {
        die("Error: Insert failed: " . mysqli_error($connection));
    }
   echo "New TA was added!";
   mysqli_close($connection);
 }
 else echo "Error: TA was not added. Form was incomplete";
 }
 else
 {
  echo "Error: TA was not added. Form was incomplete.";
 }
?>
</div>
</body>
</html>