<?php 
require 'includes/vars.inc.php';
$pageTitle = "Signed Out - " . $appVars['appName'];
require "includes/header.inc.php";
require "includes/nav.inc.php";
// log page usage
log_page($db,"Signed Out");

if(isset($_SESSION['loggedin'])){
	session_destroy();
}
?>
<div class="container">
<div class="alert alert-success" role="alert">You have been logged out from <?php echo $appVars['appName'];?></div>
<?php require_once('includes/footer.inc.php') ?>
</div>