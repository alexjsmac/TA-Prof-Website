<?php

require_once 'functions.php';

session_start();
$curr_user = ' (Guest) ';

if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$loggedin = TRUE;
	$userstr = " ($username) ";
}
else $loggedin = FALSE;

?>
