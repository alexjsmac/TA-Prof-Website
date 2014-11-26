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
    <?php require_once 'login_status.php'; logbutton($loggedin,$userstr); ?>
    <div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Modify a TA's information</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
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
                        User ID: <input type="text" name="userid"><br>
                       <input type="submit" value="Add New Professor">
                   </form>
                   <h2>DELETE A PROFESSOR:</h2>
                    <form action="delprof.php" method="post">
                        User ID: <input type="text" name="userid"><br>
                       <input type="submit" value="Delete Professor">
                   </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Assign a professor to a TA</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="http://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
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
                    <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="http://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
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
                    <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="http://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>                                     