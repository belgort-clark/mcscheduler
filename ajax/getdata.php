<?php

$shifts = [
	0 => 'Cannot Work',
	1 => 'Midnight to 6 AM',
	2 => '6 AM to Noon',
	3 => 'Noon to 6 PM',
	4 => '6 PM to Midnight'
];


$day = $_GET['day'];
require '../includes/db_connect.inc.php';
$sql = 'SELECT * FROM users WHERE role="user" and ' . $day . ' > 0 ORDER BY ' . $day . ', first_name ';

$result = $db->query($sql);

if ($result->num_rows >= 1) {
	$data = '<div class="table-responsive"><table class="shifts table table-bordered table-striped table-hover">';
	$data .= '<tr><thead class="table-primary"><th>Team Member</th><th>Desired Shift</th></thead></tr>';
	while ($row = $result->fetch_assoc()) {
		$data .= '<tr table-primary><td><strong>' . $row['first_name'] . ' ' . $row['last_name'] . '</strong></td>' . '<td>' . $shifts[$row[$day]] . '</td></tr>';
	}
	$data .= '</table></div>';
} else {
	$data = '<div class="alert alert-danger">No one can work that day</div>';
}

echo $data;
?>