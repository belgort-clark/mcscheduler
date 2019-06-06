<?php 
	require 'includes/vars.inc.php';
	$pageTitle = $appVars['appName'];
	require 'includes/header.inc.php';
	require 'includes/nav.inc.php';
	log_page($db,'Scheduler Home Page');
?>
  
</div>
<div class="container">
	<?php 
		if (!isset($_SESSION['loggedin'])) {
			echo '<div class="alert alert-info">You need to be <a href="login.php">signed in</a> to use this site.</div>';
			echo '<div class="alert alert-info">If you do not have an account please create one <a href="register.php">here</a>.</div>';
		}
	?>

	<?php 
	if (isset($_SESSION['loggedin'])) {
		echo '<div class="col-lg-12 col-md-12"><h4>Store Announcements</h4></div>';
		$sql = "SELECT * FROM ANNOUNCEMENTS";
		$result = $db->query($sql);
		echo '<div class="col-lg-12 col-md-12">';

		while ($row = $result->fetch_assoc()) {
			$phpdate = strtotime( $row['date'] );
			// $mysqldate = date( 'm/d/Y', $phpdate );
			// echo '<h4><span class="badge badge-info">New</span> ' . $mysqldate . '&nbsp;-&nbsp;<strong>' . $row['title'] . '</strong></h4>';
			// echo '<div class="col-md-12 col-lg-12 col-mb-3">';
			echo '<div class="card card-body"><h4><span class="badge badge-info">New</span>';
			// echo '<img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Big_Mac_hamburger.jpg/800px-Big_Mac_hamburger.jpg" alt="Card image cap">';
			echo "<h5 class=\"card-title\">{$row["title"]}</h5>";
			echo "<h6 class=\"card-subtitle mb-2 text-muted\">" . date( 'm/d/Y', $phpdate ) . "</h6>";
			echo '<p>' . $row['text'] . '</p>';
			echo '</div>';

		}
			echo '</div>';

	}
	?>


</div>

<?php 
	require 'includes/footer.inc.php';
?>