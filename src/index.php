<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
require('functions.inc.php');

$output = array(
	"error" => false,
    "items" => "",
	"attendance" => 0,
	"sorted_attendance" => ""
);

try {
	// validate input data
	$items = array();
	$attendances = array();
	for ($i = 1; $i <= 4; $i++) {
		// get the item and attendance values from the request
		$item = $_REQUEST['item_'.$i];
		$attendance = $_REQUEST['attendance_'.$i];
		// check if the item value is empty
		if (empty($item) || !isset($item)) {
			throw new Exception("One or more items are empty.");
		}
		// check if the attendance value is empty
		if (empty($attendance) || !isset($attendance)) {
			throw new Exception("One or more attendances are empty.");
		}
		// check if the attendance value is a number
		if (!is_numeric($attendance)) {
			throw new Exception("One or more attendances are not numbers.");
		}
		array_push($items,$item);
		array_push($attendances,$attendance);
	}

	// sort the items by attendance
	$sorted_attendance=getSortedAttendance($items, $attendances);

	$output['items']=$items;
	$output['attendance']=$attendances;
	$output['sorted_attendance']=$sorted_attendance;

	echo json_encode($output);
	$json_output = json_encode($output);
	return($json_output);
	exit();

} catch (Exception $e) {
	$output['error'] = true;
	$output['message'] = $e->getMessage();
	echo json_encode($output);
	$json_output = json_encode($output);
	return($json_output);
	exit();
}
