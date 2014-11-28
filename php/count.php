<?php

require_once 'functions.php';
require_once 'connectdb.php';

function num_students($course, $term, $year, $connection)
{
	$query = 'select numstudents from assignedto where coursenum="' . $course . '" and term="' . $term .
	'" and year="' . $year . '"';

	$result = query_database($connection, $query);
	return $result;
}

function set_num_students($course, $term, $year, $numstudents,$connection)
{
	$query = 'update assignedto set numstudents="' . $numstudents .
	'" where coursenum="' . $course . '" and term="' . $term .
	'" and year="' . $year . '"';

	$result = query_database($connection, $query);
}


function numCoursesTA($userid, $connection)
{
	$query = 'select count(studentid) from assignedto where studentid="' . $userid . '"';
	$result = mysqli_query($connection, $query);
	echo $result;

	return $result;
}

function validNumCourses($userid, $connection)
{
	$type = getStudentType($userid, $connection);
	$numcourse = numCoursesTA($userid, $connection);
	if ($numcourse > 3 && $type=="Masters")
	{
		return false;
	}
	else if ($numcourse > 8 && $type=="PhD")
	{
		return false;
	}
	else
		return true;
}

function validCourseSession($course, $term, $year, $connection)
{
	$query = 'select distinct coursenum, term, year from assignedto where coursenum="' . $course . '" and term="' . $term . '"and year="' . $year . '"';
	$result = mysqli_query($connection, $query);
	if ($result == null)
	{
		return false;
	}
	else
		return true;
}

function getStudentType($userid, $connection)
{
	$query = 'select type from ta where userid="' . $userid . '"';
	$result = query_database($connection, $query);
	return $result;
}



?>