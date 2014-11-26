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
    <div class="jumbotron">
      <h1 align="center">CS3319 Assignment 3</h1>
      <p align="center">By: Alex MacLean & Will Callaghan</p>
    </div>

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
            <li class="active"><a href="prof.php">Home <span class="sr-only">(current)</span></a></li>
            <?php require_once 'login_status.php'; if($loggedin) echo '<li><a href="admin.php">Edit Database</a></li>';?>
          </ul>
          <?php require_once 'login_status.php'; logbutton($loggedin, $userstr); ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="bs-example">
      <h2>View TAs here:</h2>
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">List TAs assigned to a professor</a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
              <form action="getdata.php" method="post">
                <?php
                include 'getTAs.php';
                ?>
                <br/>
                <button class="btn btn-success">Get TAs</button>
              </form>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">List TAs assigned to a course</a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
              <form action="getdata.php" method="post">
                <?php
                include 'listCourses.php';
                ?>
                <br/>
                <button class="btn btn-success">Get TAs</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="fix-for-navbar-spacing" style="height: 42px;">&nbsp;</div>
    <div class = "navbar navbar-default navbar-fixed-bottom">
      <div class = "container">
        <p class = "navbar-text">CS3319A Assignment 3 - Created By Alex MacLean and William Callaghan</p>
      </div>
    </div>
  </div>
</body>
</html>                                     