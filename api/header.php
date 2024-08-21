<?php
// Error Reporting Turn On
ini_set('error_reporting', E_ALL);

// Host Name
$dbhost = 'localhost';

// Database Name
$dbname = 'blog';

// Database Username
$dbuser = 'root';

// Database Password
$dbpass = '';


try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}