  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="scheduler.php"><?php echo $appVars['appName']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="scheduler.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <?php 
      if (isset($_SESSION['loggedin'])) {
        $loggedIn = 1;
      } else {
        $loggedIn = 0;
      }

      if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
      } else {
      	$role = '';
      }

      if ($loggedIn == 0) {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Sign In</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
        </li>
      <?php } ?>
    <?php 
     if ($loggedIn == 1) { ?>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myschedule.php">Days I Can Work</a>
      </li>
    <?php } ?>
        <?php 
      if ($role == 'admin') { ?>
      <li class="nav-item">
          <a class="nav-link" href="availability.php">View Availability</a>
      </li>
      <?php } ?>
      <?php
      if ($loggedIn == 1) { ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Sign Out</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="help.php">Help</a>
      </li>
    </ul>
   <!--  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
  </div>