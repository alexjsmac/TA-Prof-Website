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
		echo '<a href = "logout.php" type="button" class="btn btn-primary navbar-btn navbar-right">Logout</a>';
		echo '<p class="navbar-text navbar-right">Signed in as ' . $user . '&nbsp&nbsp&nbsp</p>';
	}
	else if (!$status)
	{
		echo '<a href = "login.php" type="button" class="btn btn-primary navbar-btn navbar-right">Login</a>';
	}
}

?>
