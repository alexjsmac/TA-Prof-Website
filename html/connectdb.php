<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "";
$dbname = "";

try {
	$connection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbser, $dbpass);
	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
	echo "Database access failed.";	
}

?>