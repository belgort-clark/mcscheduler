<?php 
require 'includes/vars.inc.php';
$pageTitle = $appVars['appName'];
require 'includes/header.inc.php';
require 'includes/nav.inc.php';
log_page($db,'Scheduler My Schedule');
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['sunday'])) {
		$sunday = $_POST['sunday'];
	} else {
		$sunday = 0;
	}

	if (isset($_POST['monday'])) {
		$monday = $_POST['monday'];
	} else {
		$monday = 0;
	}

	if (isset($_POST['tuesday'])) {
		$tuesday = $_POST['tuesday'];
	} else {
		$tuesday = 0;
	}

	if (isset($_POST['wednesday'])) {
		$wednesday = $_POST['wednesday'];
	} else {
		$wednesday = 0;
	}

	if (isset($_POST['thursday'])) {
		$thursday = $_POST['thursday'];
	} else {
		$thursday = 0;
	}

	if (isset($_POST['friday'])) {
		$friday = $_POST['friday'];
	} else {
		$friday = 0;
	}

	if (isset($_POST['saturday'])) {
		$saturday = $_POST['saturday'];
	} else {
		$saturday = 0;
	}

	$sql = "UPDATE users SET sunday='" . $sunday . 
	"',monday='" . $monday . 
	"',tuesday='" . $tuesday .
	"',wednesday='" . $wednesday . 
	"',thursday='" . $thursday . 
	"',friday='" . $friday .
	"',saturday='" . $saturday .  
	"' WHERE id=" . $id;

	$result = $db->query($sql);

	if($db->error){
		echo '<div class="container">';
		echo '<div class="alert alert-danger">' . $db->error . '</div>';
		echo '</div>';
	} else {
		echo '<div class="container">';
		echo '<div class="alert alert-success">Your Day and Shift selections have been successfully saved.</div>';
		echo '</div>';
		$success = true;
	}

} else {
	$sql = "SELECT * FROM users WHERE ID=" . $_SESSION['id'];
	$result = $db->query($sql);

	while ($row = $result->fetch_assoc()) {
		$sunday = $row['sunday'];
		$monday = $row['monday'];
		$tuesday = $row['tuesday'];
		$wednesday = $row['wednesday'];
		$thursday = $row['thursday'];
		$friday = $row['friday'];
		$saturday = $row['saturday'];
	}
}

?>
<div class="container">
	<h4>Select Which Days & Shifts You Can Work</h4>
	<div class="alert alert-info">
		Your manager will use the information you provide below to schedule when you work.
	</div>
	<div class="alert alert-info">
		Each day of the week allows you to select a shift that you are available to work. If you cannot work on a specific day, select "I cannot work that day".
	</div>
	<div class="alert alert-danger">
		Please have your updates in prior to Tuesday, May 29, 2018 by 10 PM.
	</div>
	<form method="POST" class="card p-2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="sunday">Sunday</label>
		<div class="row col-md-8 col-lg-6 mb-3">
			<select class="form-control" id="sunday" name="sunday">
				<option value="0" <?php echo ($sunday == 0) ? "selected" : ""  ?>>I cannot work this day</option>
				<option value="1" <?php echo ($sunday == 1) ? "selected" : ""  ?>>Midnight - 6 AM</option>
				<option value="2" <?php echo ($sunday == 2) ? "selected" : ""  ?>>6 AM - Noon</option>
				<option value="3" <?php echo ($sunday == 3) ? "selected" : ""  ?>>Noon - 6 PM</option>
				<option value="4" <?php echo ($sunday == 4) ? "selected" : ""  ?>>6 PM - Midnight</option>
			</select>
		</div>
		<label for="monday">Monday</label>
		<div class="row col-md-8 col-lg-6 mb-3">
			<select class="form-control" id="monday" name="monday">
				<option value="0" <?php echo ($monday == 0) ? "selected" : ""  ?>>I cannot work this day</option>
				<option value="1" <?php echo ($monday == 1) ? "selected" : ""  ?>>Midnight - 6 AM</option>
				<option value="2" <?php echo ($monday == 2) ? "selected" : ""  ?>>6 AM - Noon</option>
				<option value="3" <?php echo ($monday == 3) ? "selected" : ""  ?>>Noon - 6 PM</option>
				<option value="4" <?php echo ($monday == 4) ? "selected" : ""  ?>>6 PM - Midnight</option>
			</select>
		</div>
		<label for="tuesday">Tuesday</label>
		<div class="row col-md-8 col-lg-6 mb-3">
			<select class="form-control" id="tuesday" name="tuesday">
				<option value="0" <?php echo ($tuesday == 0) ? "selected" : ""  ?>>I cannot work this day</option>
				<option value="1" <?php echo ($tuesday == 1) ? "selected" : ""  ?>>Midnight - 6 AM</option>
				<option value="2" <?php echo ($tuesday == 2) ? "selected" : ""  ?>>6 AM - Noon</option>
				<option value="3" <?php echo ($tuesday == 3) ? "selected" : ""  ?>>Noon - 6 PM</option>
				<option value="4" <?php echo ($tuesday == 4) ? "selected" : ""  ?>>6 PM - Midnight</option>
			</select>
		</div>
		<label for="wednesday">Wednesday</label>
		<div class="row col-md-8 col-lg-6 mb-3">
			<select class="form-control" id="wednesday" name="wednesday">
				<option value="0" <?php echo ($wednesday == 0) ? "selected" : ""  ?>>I cannot work this day</option>
				<option value="1" <?php echo ($wednesday == 1) ? "selected" : ""  ?>>Midnight - 6 AM</option>
				<option value="2" <?php echo ($wednesday == 2) ? "selected" : ""  ?>>6 AM - Noon</option>
				<option value="3" <?php echo ($wednesday == 3) ? "selected" : ""  ?>>Noon - 6 PM</option>
				<option value="4" <?php echo ($wednesday == 4) ? "selected" : ""  ?>>6 PM - Midnight</option>
			</select>
		</div>
		<label for="thursday">Thursday</label>
		<div class="row col-md-8 col-lg-6 mb-3">
			<select class="form-control" id="thursday" name="thursday">
				<option value="0" <?php echo ($thursday == 0) ? "selected" : ""  ?>>I cannot work this day</option>
				<option value="1" <?php echo ($thursday == 1) ? "selected" : ""  ?>>Midnight - 6 AM</option>
				<option value="2" <?php echo ($thursday == 2) ? "selected" : ""  ?>>6 AM - Noon</option>
				<option value="3" <?php echo ($thursday == 3) ? "selected" : ""  ?>>Noon - 6 PM</option>
				<option value="4" <?php echo ($thursday == 4) ? "selected" : ""  ?>>6 PM - Midnight</option>
			</select>
		</div>
		<label for="friday">Friday</label>
		<div class="row col-md-8 col-lg-6 mb-3">
			<select class="form-control" id="friday" name="friday">
				<option value="0" <?php echo ($friday == 0) ? "selected" : ""  ?>>I cannot work this day</option>
				<option value="1" <?php echo ($friday == 1) ? "selected" : ""  ?>>Midnight - 6 AM</option>
				<option value="2" <?php echo ($friday == 2) ? "selected" : ""  ?>>6 AM - Noon</option>
				<option value="3" <?php echo ($friday == 3) ? "selected" : ""  ?>>Noon - 6 PM</option>
				<option value="4" <?php echo ($friday == 4) ? "selected" : ""  ?>>6 PM - Midnight</option>
			</select>
		</div>
		<label for="saturday">Saturday</label>
		<div class="row col-md-8 col-lg-6 mb-3">
			<select class="form-control" id="saturday" name="saturday">
				<option value="0" <?php echo ($saturday == 0) ? "selected" : ""  ?>>I cannot work this day</option>
				<option value="1" <?php echo ($saturday == 1) ? "selected" : ""  ?>>Midnight - 6 AM</option>
				<option value="2" <?php echo ($saturday == 2) ? "selected" : ""  ?>>6 AM - Noon</option>
				<option value="3" <?php echo ($saturday == 3) ? "selected" : ""  ?>>Noon - 6 PM</option>
				<option value="4" <?php echo ($saturday == 4) ? "selected" : ""  ?>>6 PM - Midnight</option>
			</select>
		</div>
		<div class="row col-md-8 col-lg-6 mb-3">
			<input class="btn btn-lg btn-primary btn-block" type="submit" value="Save My Days/Shfts">
		</div>
	</form>

</div>

<?php 
require 'includes/footer.inc.php';
?>