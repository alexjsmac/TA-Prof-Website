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
                            <input type="submit" value="Get TAs">
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
                            <input type="submit" value="Get TAs">
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Or log in to access secretary priviledges:</h2>
        </div>
        <div class=>
        <div class="span12">
            <form class="form-horizontal" action='' method="POST">
              <fieldset>
                <div class="control-group">
                  <!-- Username -->
                  <label class="control-label"  for="username">Username</label>
                  <div class="controls">
                    <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <!-- Password-->
                  <label class="control-label" for="password">Password</label>
                  <div class="controls">
                    <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <!-- Button -->
                  <div class="controls">
                    <button class="btn btn-success">Login</button>
                  </div>
                </div>
              </fieldset>
            </form>
        </div>
    </div>
    </div>
</body>
</html>                                     