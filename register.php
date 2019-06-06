<?php
require 'includes/vars.inc.php';
$pageTitle = "Register " . $appVars['appName'];
require 'includes/header.inc.php';
require 'includes/nav.inc.php';
?>
<div class="container">
	<?php 
	$success = false;

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Required field names
		$required = array('firstname', 'lastname', 'email', 'password', 'phone');

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
			$first_name = $db->real_escape_string($_POST['firstname']);
			$last_name = $db->real_escape_string($_POST['lastname']);
			$email = $db->real_escape_string($_POST['email']);
			$phone = $db->real_escape_string($_POST['phone']);
			$password = hash('sha512', $_POST['password']);
			$sql = "INSERT INTO users (role,first_name,last_name,email,password,phone,sunday,monday,tuesday,wednesday,thursday,friday,saturday) VALUES ('user','$first_name' ,'$last_name','$email','$password','$phone',0,0,0,0,0,0,0)";
				// echo $sql;
			$result = $db->query($sql);

			if($db->error){
				echo '<div class="alert alert-danger">' . $db->error . '</div>';
			} else {
				echo '<div class="alert alert-success">Your registration has been successfully processed. You can now <a href="login.php" title="login">login</a></div>';
				$success = true;
			}
		}
	}

	if (!$success) { ?>
		<h4>Create Your <?php echo $appVars['appName']; ?> Account</h4>

		<div class="alert alert-success alert-dismissible">
    		<button type="button" class="close" data-dismiss=	"alert">x</button>
   			Before you can start using the <?php echo $appVars['appName']; ?> application you must first create an account. Don't share your password with anybody. Not even your manager or your cat.
		</div>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" class="needs-validation card p-2">
			<div>
				<label for="firstname">First Name</label>
				<div>
					<div class="row col-md-8 col-lg-6 mb-3">
						<input class="form-control" type="text" id="firstname" name="firstname" size="30" maxlength="30" value="<?php if(isset($_POST["firstname"])){echo $_POST["firstname"];} ?>">
					</div>

					<div>
						<label for="lastname">Last Name</label>
					</div>
					<div class="row col-md-8 col-lg-6 mb-3">
						<input class="form-control" type="text" id="lastname" autocomplete="off" name="lastname" size="30" maxlength="30" value="<?php if(isset($_POST["lastname"])){echo $_POST["lastname"];} ?>">
					</div>

					<div>
						<label for="phone">Cell Phone</label>
					</div>
					<div class="row col-md-8 col-lg-6 mb-3">
						<input class="form-control" type="text" id="phone" autocomplete="off" name="phone" size="30" maxlength="30" value="<?php if(isset($_POST["phone"])){echo $_POST["phone"];} ?>">
					</div>

					<div>
						<label for="email">Email</label>
					</div>
					<div class="row col-md-8 col-lg-6 mb-3">
						<input class="form-control" type="email" id="email" name="email" size="40" maxlength="40" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} ?>">
					</div>

					<div>
						<label for="password">Password</label>
					</div>
					<div class="row col-md-8 col-lg-6 mb-3">
						<input class="form-control" type="password" id="password" name="password" size="30" maxlength="30" value="<?php if(isset($_POST["password"])){echo $_POST["password"];} ?>">
					</div>

					<div class="row col-md-8 col-lg-6 mb-3">
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Register">
					</div>
				</form>
			</div>
		<?php } ?>
		<?php require 'includes/footer.inc.php'; ?>
		<?php $db->close(); ?>