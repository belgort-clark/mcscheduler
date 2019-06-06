<?php 
require 'includes/vars.inc.php';
$pageTitle = 'Sign In - ' . $appVars['appName'];
require 'includes/header.inc.php';
require 'includes/nav.inc.php';
log_page($db,'Sign In');
?>
<div class="container">
	<?php
	$success = false;

	if($_SERVER["REQUEST_METHOD"] == "POST"){
			// Required field names
		$required = array('email','password');

		// Loop over field names, make sure each one exists and is not empty
		$error = false;
		foreach($required as $field) {
			if (empty($_POST[$field])) {
				$error = true;
			}
		}

		if ($error) {
			echo '<div class="alert alert-warning">All fields are required.</div>';
		} else {
			$status = login($db);

		if ($status){
			$success = true;
		} else {
			echo '<div class="alert alert-warning">Could not log you in. Please try again.</div>';
		}

		}
	}

	$db->close();
	?>

	<form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<!-- 		<img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
-->	<h1 class="h5 mb-3 font-weight-normal">Please Sign In To <?php echo $appVars['appName']; ?></h1>
<label for="inputEmail">Your Email Address</label>
<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<br>
<label for="inputPassword">Password</label>
<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
<div class="checkbox mb-3">
	<label>
		<input type="checkbox" value="remember-me"> Remember me
	</label>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
</div>

<?php 
require 'includes/footer.inc.php';
?>