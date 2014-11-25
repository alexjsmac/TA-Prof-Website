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

