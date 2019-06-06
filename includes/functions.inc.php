<?php

function login($db){
	$email = $db->real_escape_string($_POST['email']);
	$password = hash('sha512', $_POST['password']);

	$sql = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'" . " AND password=" . "'" . $password . "' LIMIT 1";
	
	$result = $db->query($sql);

	if ($result->num_rows == 1){
		// return true;
		$row = $result->fetch_assoc();
		$_SESSION['firstname'] = $row['first_name'];
		$_SESSION['lastname'] = $row['last_name'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['loggedin'] = 1;
		$_SESSION['role'] = $row['role'];
		header("location: scheduler.php");
	} else {
		return false;
	}
}


function log_page($db,$page_name){
	if(!isset($_SESSION['id'])){
		$user_id = "0";
	} else {
		$user_id = $_SESSION['id'];
	}
	$sql = "INSERT INTO logs (user_id,page_name) VALUES ('$user_id','$page_name')";
	$result = $db->query($sql);
}

function build_select($db,$key){
	$sql = "SELECT name,value FROM keywords WHERE key_name='" . $key . "'";

	$result = $db->query($sql);

	while($row = $result->fetch_assoc()) {?>
		<option value=<?php echo '"' . $row['value'] . '"' . ">" . $row['name'] . "</option>";?>
	<?php }
}

function insert_post($db){
	$user_id = $db->real_escape_string($_SESSION['id']);
	$content = $db->real_escape_string($_POST['content']);
	$mood = $db->real_escape_string($_POST['mood']);
	$sql = "INSERT INTO posts (user_id,content,mood) VALUES ('$user_id','$content','$mood')";

	$result = $db->query($sql);

	if(!$db->error){
		header("location: clarkbook.php");
	} else {
		return false;
	}
}

function hide_post($db){
	$sql = "UPDATE posts SET hidden=1 WHERE id=" . $_GET['id'] . " LIMIT 1";
	
	$result = $db->query($sql);

	if (!$db->error){
		$db->close();
		header("location: clarkbook.php");
	} else {
		return false;
	}
}

function delete_post($db){
	
	$sql = "DELETE FROM posts WHERE id=" . $_GET['id'] . " LIMIT 1";
	echo $sql;
	
	$result = $db->query($sql);

	if (!$db->error){
		$db->close();
		header("location: clarkbook.php");
	} else {
		return false;
	}
}
?>
