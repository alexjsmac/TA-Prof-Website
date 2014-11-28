<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Department of Computer Science - TA Management System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <style type=”text/css”>
    .jumbotron{
        background-image: url("../img/banner.jpg");
        background-size:cover;
    }
    </style>
</head>
<body>
    <?php
    require_once 'connectdb.php';
    require_once 'login_status.php';
    if(!$loggedin) header("Location: login.php");
    ?>
    <div class="container">
        
        <img src="../img/banner.jpg" style='width:100%;'/>
        <br/><br/>
        

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
                    <form action="addnewta.php" method="post" enctype="multipart/form-data">
                        First Name: <input type="text" name="firstname"><br/>
                        Last Name: <input type="text" name="lastname"><br>
                        Student #: &nbsp;<input type="text" name="studentnum"><br>
                        User ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="userid"><br>
                        Type: <br>
                        <input type="radio" name="type" value="PhD" checked="true"> PhD<br>
                        <input type="radio" name="type" value="Masters"> Masters<br><br>
                        Upload Image: <input type="file" name="file" id="file"><br><br>
                        <button class="btn btn-success">Add TA</button>
                    </form>
                    <h2>DELETE A TA:</h2>
                    <form action="delTA.php" method="post">
                        <?php
                        require_once 'getTAs.php';
                        require_once 'connectdb.php';
                        get_tas("userid", $connection);
                        ?>
                        <br/>
                        <button class="btn btn-danger">Delete TA</button>
                        <br/><br/><b>Warning: Deleting a TA will remove all instances of them in the application.</b>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Modify/View a TA's information</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <form action="modTA.php" method="post">
                        <?php
                        require_once 'getTAs.php';
                        require_once 'connectdb.php';
                        get_tas("userid", $connection);
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
                        User ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="userid"><br><br>
                        <button class="btn btn-success">Add New Professor</button>
                    </form>
                    <h2>DELETE A PROFESSOR:</h2>
                    <form action="delprof.php" method="post">
                        <?php
                        require_once 'getProfs.php';
                        require_once 'connectdb.php';
                        get_profs("userid", $connection);
                        ?>
                        <br/>
                        <button class="btn btn-danger">Delete Professor</button>
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
                    <form action="assignTAProf.php" method="post">
                        <?php
                        require_once 'getProfs.php';
                        require_once 'getTAs.php';
                        require_once 'connectdb.php';
                        get_tas("userid", $connection);
                        echo '<br/>';
                        get_profs("userid", $connection);
                        ?>
                        <br/>
                        Head supervisor or Co-Supervisor: <br>
                        <input type="radio" name="supervisor" value="head" checked="true"> Head Supervisor<br>
                        <input type="radio" name="supervisor" value="co"> Co-Supervisor<br><br>
                        <button class="btn btn-success">Assign TA</button>
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
                    <form action="addCourse.php" method="post">
                        Course Name: &nbsp;&nbsp;&nbsp;<input type="text" name="coursename"><br>
                        Course Number: <input type="text" name="coursenum"><br><br>
                        <button class="btn btn-success">Add New Course</button>
                    </form>
                    <h2>DELETE A COURSE:</h2>
                    <form action="delCourse.php" method="post">
                        <?php include 'listCourses.php' ?>
                        <br/>
                        <button class="btn btn-danger">Delete Course</button>
                        <br/><br/><b>Warning: Deleting a Course will remove all instances of this course within the application.</b>
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
                    <form action="assignTAProf.php" method="post">
                        <?php include 'listCourses.php';
                        require_once 'termYearOpt.php';
                        select_term();
                        select_year();
                        echo '<br/>';
                        require_once 'getTAs.php';
                        require_once 'connectdb.php';
                        get_tas("userid", $connection);
                         ?>
                         <br/>
                        Number of Students: <input type="text" name="numStudents"><br><br>
                        <button class="btn btn-success">Add New Assignment</button>
                    </form>
                    <h2>REMOVE A TA FROM A COURSE:</h2>
                    <form action="deleteTAFromCourse.php" method="post">
                        <?php include 'listCourses.php';
                        require_once 'termYearOpt.php';
                        select_term();
                        select_year();
                        echo '<br/>';
                        require_once 'getTAs.php';
                        require_once 'connectdb.php';
                        get_tas("userid", $connection);
                         ?>
                         <br/>
                        <button class="btn btn-danger">Delete TA From Course</button>
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