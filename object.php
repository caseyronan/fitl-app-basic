<?php

$id = $_REQUEST['id'];

$object = array(
	'points' => '',
	'question' => '',
	'answer' => '',
	'image' => '',
	'normal' => '',
	'name' => ''
);

// Connection credentials
$servername = 'localhost';
$username = 'homestead';
$password = 'secret';

// Connect to the database
$connection = new mysqli($servername, $username, $password);

// Error checking
if ($connection->connect_error) {
	echo 'Connection failed: ' . $connection->connect_error;
	exit;
}

// Connect to our database
$connection->select_db('fitl');

// Query to select object
$sql = 'SELECT * FROM games WHERE id = ' . $id;

// Execute query
$result = $connection->query($sql);

// Check for object and retrieve it
if ($result->num_rows > 0) {
	$object = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $object['name']; ?></title>
	</head>
	<body>		
		<pre><?php echo $object['points']; ?></pre>
		<h1><?php echo $object['question']; ?></h1>
		<p><?php echo $object['answer']; ?></p>
	</body>
</html>
