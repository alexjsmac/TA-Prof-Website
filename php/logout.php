<?php

require_once 'functions.php';

if(isset($_SESSION['username']))
{
	destroy_session();
	header("Location: prof.php");
	echo "<div class = 'main'><br>" .
	"You have been logged out.";
}
else
{
	else echo "<div class = 'main'><br>" .
		"You cannot log out because you are not logged in";
}



?>