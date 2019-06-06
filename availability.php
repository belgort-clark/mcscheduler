<?php 
	require 'includes/vars.inc.php';
	$pageTitle = 'Availability - ' . $appVars['appName'];
	require 'includes/header.inc.php';
	require 'includes/nav.inc.php';
	log_page($db,'Scheduler Home Page');
?>
<div class="container">
	<!-- <form method="POST" class="card p-2" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
		<label for="day">Select a Day</label>
		<div class="row col-md-5 col-lg-5 mb-3">
			<select class="form-control" id="day" name="day">
				<option value="-">-- Select Day --</option>
				<option value="sunday">Sunday</pption>
				<option value="monday">Monday</pption>
				<option value="tuesday">Tuesday</pption>
				<option value="wednesday">Wednesday</pption>
				<option value="thursday">Thursday</pption>
				<option value="friday">Friday</pption>
				<option value="saturday">Saturday</pption>
			</select>
		</div>
	<!-- </form> -->
</div>
<div class="container" id="list">
	<div class="col-lg-12 col-md-12 col-mb-3"></div>
</div>
<?php 
	require 'includes/footer.inc.php';
?>
<script>
	function doAjax(day) {
		$.ajax({
			url: 'ajax/getdata.php?day=' + day,
		})
		.done(function(data) {
			$('#list').html(data);
		})
		.fail(function() {
		});
	}

	$('#day').on('change',function(evt){
		if ($(this).val() == '-') {
			$('#list').empty();
			evt.preventDefault();
		} else {
			doAjax($(this).val());
		}

	});
</script>