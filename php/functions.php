<?php

require_once 'connectdb.php';

function destroy_session()
{
	$_SESSION = array();

	if (session_id() != "" || isset($_COOKIE[session_name()]))
	{
		setcookie(session_name(), '', time()-2592000, '/');
	}

	session_destroy();
}

function query_database($connection, $query)
{
	$result = mysqli_query($connection, $query);
	if(!$result)
	{
		die("Database query failed.");
	}
	else
	{
		return $result;
	}
}

