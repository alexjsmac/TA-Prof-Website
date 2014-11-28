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
  $whichTA = $_POST["TAs"];
  if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["type"]))
  {
   $fname = $connection->real_escape_string($_POST["fname"]);
   $lname = $connection->real_escape_string($_POST["lname"]);
   $type = $connection-> real_escape_string($_POST["type"]);
   $currImage = $connection->real_escape_string($_POST["currImage"]);
   if($fname == null && $lname == null)
   { 
    $error = "First and Last name cannot be empty!";
  }
  else if($fname == null)
  {
    $error = "First name cannot be empty!";
  }
  else if ($lname == null)
  {
    $error = "Last name cannot be empty!";
  }
  else
  {
    $query = 'update ta set firstname="' . $fname . '", lastname="' . $lname . '", type="' . $type . '", image="' . $currImage . 'where userid="' . $whichTA .'"';
    $result = mysqli_query($connection, $query);
    if (!$result)
      $error = "Update failed. Please try again.";
    else
    {
      header("Location: admin.php");
    }
  }
}
else
  $error = ""; 

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

  <?php
  if ($whichTA != null)
  {
    $query = 'select t.firstname, t.lastname, t.type, t.image from ta as t where t.userid ="' . $whichTA . '"';
  }

  $result=mysqli_query($connection,$query);
  if (!$result)
   die("database query2 failed. " . $connection->error);

 while ($row=mysqli_fetch_assoc($result)) {
  $fname = $row['firstname'];
  $lname = $row['lastname'];
  $type = $row['type'];
  $currImage = $row['image'];
}
?>

<h3>Modify: <?php echo $fname . ' ' . $lname; ?></h3>

<?php require_once 'login_status.php'; require_once 'upload_pic.php'; display_error($error); ?>
<form action="modTA.php" method="post" enctype="multipart/form-data">
  <?php echo 'First Name: <input type="text" name="fname" id="$fname" value="' . $fname . '"><br>' .
  'Last Name: <input type="text" name="lname" id="$lname" value ="' . $lname . '"><br>'; ?>
  Type: <br>
  <?php display_default($type)?>
  <?php echo '<input type="file" name="file" id="file" value="' . $currImage . '"><br/>'; ?>
  <?php echo '<input type="hidden" name="TAs" id="$TAs" value="' . $whichTA . '">'; ?>
  <button class="btn btn-success">Update</button>
</form>

<?php
mysqli_close($connection);
?>
</div>
</body>
</html>

<?php
function display_default($type)
{
  if($type == "Masters")
  {
    echo '<input type="radio" name="type" id="$type" value="PhD">PhD<br>
    <input type="radio" name="type" id="$type" value="Masters" checked="true">Masters<br><br>';
  }
  else
  {
    echo '<input type="radio" name="type" id="$type" value="PhD" checked="true">PhD<br>
    <input type="radio" name="type" id="$type" value="Masters">Masters<br><br>';
  }
}
?>