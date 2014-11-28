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
		<h1>Attempting Assignment:</h1>
			<?php
			include 'connectdb.php';
			require_once 'count.php';
			require_once 'login_status.php';
    		if(!$loggedin) header("Location: login.php");

			if ((isset($_POST["TAs"])) && (isset($_POST["professors"])))
			{
				$userid = $connection->real_escape_string($_POST["TAs"]);
				$profid = $connection->real_escape_string($_POST["professors"]);
				$type = $connection->real_escape_string($_POST["supervisor"]);

				if($type == "co")
				{
					$query = 'insert into cosupervises (superid, studentid) values ("' . $profid . '", "' . $userid . '")'; 
				}
				else if ($type == "head")
				{
					$query = 'update ta set headid="' . $profid . '" where userid="' . $userid . '"'; 
				}
			}
			else if ((isset($_POST["TAs"])) && isset($_POST["courses"]) && isset($_POST["term"]) && isset($_POST["year"]))
			{
				$userid = $connection->real_escape_string($_POST["TAs"]);
				$course = $connection->real_escape_string($_POST["courses"]);
				$term = $connection->real_escape_string($_POST["term"]);
				$year = $connection->real_escape_string($_POST["year"]);
				$students = $connection->real_escape_string($_POST["numStudents"]);

				//Check to see if TA already TAs the course at specified term and year.
				$query1 = 'select studentid, coursenum, term, year from assignedto where ' .
				'studentid="' . $userid . '" and coursenum="' . $course . '" and term="' . $term .
				'" and year="' . $year . '"';
				$result = query_database($connection, $query1);

				if(mysqli_num_rows($result)>0)
				{
					die("TA already TA's this course for the specified term and year.");
				}

				//If we reached this point, the TA can TA the course.
				$query = 'insert into assignedto (studentid, coursenum, term, year) values ("' . $userid .
					'", "' . $course . '", "' . $term . '", "' . $year . '")';
			}
			else
				die("Error: Assignment failed.");

			if (!mysqli_query($connection, $query)) {
				die("Error: Assignment failed: " . mysqli_error($connection));
			}

			if($students != null)
			{
				set_num_students($course, $term, $year, $students,$connection);
			}
			echo "Assignment successful.";

			//Get the count of how many courses the TA has TAd.
			$query2 = 'select count(studentid) as total from assignedto where studentid="' . $userid . '"';
			$result = mysqli_query($connection, $query2);
			$row = mysqli_fetch_assoc($result);
			$count = (int)$row["total"];

				//Get the type of the TA
			$query3 = 'select type from ta where userid="' . $userid . '"';
			$result = query_database($connection, $query3);
			$row = mysqli_fetch_assoc($result);
			$type = $row["type"];

			echo '<br/><h4>Note: TA will now have been a TA for ' . $count . ' courses.</h4>';
			if ($count>3 && $type == "Masters")
			{
				echo '<h4>Note: This is more than a Masters student is allowed to TA for. </h4>';
			}
			else if ($count>8 && $type == "PhD")
			{
				echo '<h4>Note: This is more than a PhD student is allowed to TA for. </h4>';
			}

			mysqli_close($connection);

			?>
			<div id="fix-for-navbar-spacing" style="height: 42px;">&nbsp;</div>
    <div class = "navbar navbar-default navbar-fixed-bottom">
      <div class = "container">
        <p class = "navbar-text">CS3319A Assignment 3 - Created By Alex MacLean and William Callaghan</p>
      </div>
    </div>
	</div>
</body>
</html>