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
        require_once 'connectdb.php';
        require_once 'login_status.php';
        if(!$loggedin) header("Location: prof.php");
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
            <li><a href="prof.php">Home</a></li>
            <li class="active"><a href="admin.php">Edit Database <span class="sr-only">(current)</span></a></li>
          </ul>
          <?php require_once 'login_status.php'; logbutton($loggedin, $userstr); ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


    <div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Add or delete a TA</a>
                </h4>
            </div>
            <div id="collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <h2>ADD A NEW TA:</h2>
                    <form action="addnewta.php" method="post">
                        First Name: <input type="text" name="firstname"><br>
                        Last Name: <input type="text" name="lastname"><br>
                        Student Number: <input type="text" name="studentnum"><br>
                        User ID: <input type="text" name="userid"><br>
                        Type: <br>
                            <input type="radio" name="type" value="PhD"> PhD<br>
                            <input type="radio" name="type" value="Masters"> Masters<br><br>
                        Upload Image: <input type="file" name="file" id="file"><br><br>
                        <button class="btn btn-success">Add TA</button>
                    </form>
                    <h2>DELETE A TA:</h2>
                    <form action="delTA.php" method="post">
                        <?php
                          include 'getTAs.php';
                        ?>
                        <br/>
                        <button class="btn btn-success">Delete TA</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Modify a TA's information</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <form action="modTA.php" method="post">
                        <?php
                          include 'getTAs.php';
                        ?>
                        <br/>
                        <button class="btn btn-success">Modify</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add or delete a professor</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <h2>ADD A NEW PROFESSOR:</h2>
                    <form action="addnewprof.php" method="post">
                        First Name: <input type="text" name="firstname"><br>
                        Last Name: <input type="text" name="lastname"><br>
                        User ID: <input type="text" name="userid"><br><br>
                        <input type="submit" value="Add New Professor">
                    </form>
                    <h2>DELETE A PROFESSOR:</h2>
                    <form action="delprof.php" method="post">
                        <?php
                          include 'getProfs.php';
                        ?>
                        <br/>
                        <input type="submit" value="Delete Professor">
                    </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Assign a TA to a professor</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <form action="assignProf.php" method="post">
                        Professor's User ID: <input type="text" name="headid"><br>
                        TA's User ID: <input type="text" name="studentid"><br>
                        Head supervisor or Co Supervisor?: <br>
                            <input type="radio" name="term" value="head"> Head Supervisor<br>
                            <input type="radio" name="term" value="Winter"> Co Supervisor<br><br>
                        <input type="submit" value="Assign Prof">
                    </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Add or delete a course</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <h2>ADD A NEW COURSE:</h2>
                    <form action="addnewcourse.php" method="post">
                        Course Name: <input type="text" name="coursename"><br>
                        Course Number: <input type="text" name="coursenum"><br><br>
                        <input type="submit" value="Add New Course">
                   </form>
                   <h2>DELETE A COURSE:</h2>
                    <form action="delCourse.php" method="post">
                        Course Number: <input type="text" name="coursenum"><br><br>
                       <input type="submit" value="Delete Course">
                   </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Assign a TA to a course</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    <h2>ASSIGN A TA:</h2>
                    <form action="addnewAssign.php" method="post">
                        Course Number: <input type="text" name="coursenum"><br>
                        Course Term: <br>
                            <input type="radio" name="term" value="Fall"> Fall<br>
                            <input type="radio" name="term" value="Winter"> Winter<br>
                        Course Year: <input type="text" name="year"><br>
                        Student ID: <input type="text" name="userid"><br>
                        Number of Students: <input type="text" name="numStudents"><br><br>
                        <input type="submit" value="Add New Assignment">
                   </form>
                   <h2>REMOVE A TA FROM A COURSE:</h2>
                    <form action="delAssign.php" method="post">
                        Course Number: <input type="text" name="coursenum"><br>
                        Course Term: <br>
                            <input type="radio" name="term" value="Fall"> Fall<br>
                            <input type="radio" name="term" value="Winter"> Winter<br>
                        Course Year: <input type="text" name="year"><br>
                        Student ID: <input type="text" name="userid"><br><br>
                       <input type="submit" value="Delete Course">
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>                                     