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
		<ol>
			<?php

			include 'connectdb.php';
			require_once 'count.php';

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

				$query = 'insert into assignedto (studentid, coursenum, term, year) values ("' . $userid .
					'", "' . $course . '", "' . $term . '", "' . $year . '")';

				if (validNumCourses($userid, $connection) == false)
				{
					die("TA has reached maxed number of courses they can TA.");
				}
			}
			else
				echo "Error: Assignment failed.";

			if (!mysqli_query($connection, $query)) {
				die("Error: Query failed." . mysqli_error($connection));
			}
			if($students != null)
				{
					set_num_students($course, $term, $year, $students,$connection);
				}
			echo "Assignment successful.";
			mysqli_close($connection);

			?>
		</ol>
	</div>
</body>
</html>