<?php

require_once 'connectdb.php';
require_once 'functions.php';

session_start();
$curr_user = ' (Guest) ';

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	$loggedin = TRUE;
	$userstr = " ($user) ";
}
else $loggedin = FALSE;

?>
