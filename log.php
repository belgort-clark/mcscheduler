<?php
/* log.php */
session_start();

require_once('includes/functions.inc.php');

if(isset($_SESSION['role'])){
	if($_SESSION['role'] != 'admin'){
		echo "You are not authorized to use this page.";
		die();
	}
}

try {
	require_once('includes/mysqli_connect.php');
} catch(Exception $e) {
	$error = $e->getMessage();
}

?>
<?php log_page($db); ?>