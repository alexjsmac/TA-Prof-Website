<?php

require_once 'functions.php';
require_once 'connectdb.php';

function num_students($course, $term, $year, $connection)
{
	$query = 'select distinct numstudents from assignedto where coursenum="' . $course . '" and term="' . $term .
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

?>