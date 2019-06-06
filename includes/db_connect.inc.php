<?php

# Create a new connection to the database
$db = new mysqli('localhost','root','','scheduler');

# If there was an errorconnecting to the database
if ($db->connect_error) {
	$error = $db->connect_error;
	echo $error;
} // end if

# Set the character encoding of the database connection to UTF-8
$db->set_charset('utf8');