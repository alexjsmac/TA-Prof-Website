<?php

require_once 'login_status.php'

$error = "";
$user = "";
$pass = "";

if (isset($_POST['user']))
{
	$user = $mysqli->real_escape_string($_POST['user']);
	$pass = $mysqli->real_escape_string($_POST['pass']);

	if ($user == "" && $pass == "")
		$error = "Please enter in your username and password.<br/>";
	else if ($user == "")
		$error = "Please enter your username.<br/>";
	else if ($pass == "")
		$error = "Please enter your password<br/>";
	else
	{
		
	}
}

?>