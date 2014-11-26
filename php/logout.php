<?php

require_once 'functions.php';
require_once 'login_status.php';

if(isset($_SESSION['username']))
{
	destroy_session();
	header("Location: prof.php");
}

?>