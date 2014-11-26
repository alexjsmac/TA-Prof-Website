<?php

require_once 'functions.php';


session_start();
$userstr = ' (Guest) ';

if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$loggedin = TRUE;
	$userstr = $username;
}
else $loggedin = FALSE;

function logbutton($status, $user)
{
	if($status)
	{
		echo '<p align="right">Logged in as ' . $user . ' <a href = "logout.php" type="button" class="btn btn-primary">Logout</a></p>';
	}
	else if (!$status)
	{
		echo '<p align="right"><a href = "login.php" type="button" class="btn btn-primary">Login</a></p>';
	}
}

?>
