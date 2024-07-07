<?php
function getSortedAttendance($items, $attendances)
{
  try {
    // check if the number of items and attendances are the same
    if (count($items) != count($attendances)) {
      throw new Exception("The number of items and attendances are not the same.");
    }
    // check if the items and attendances are arrays
    if (!is_array($items) || !is_array($attendances)) {
      throw new Exception("The items and attendances are not arrays.");
    }
    // check if all elements in the items array have a value
    foreach ($items as $item) {
      if (empty($item)) {
        throw new Exception("One or more items are empty.");
      }
    }
    // check if all elements in the attendances array have a value
    foreach ($attendances as $attendance) {
      if (empty($attendance)) {
        throw new Exception("One or more attendances are empty.");
      }
    }
    // check if all elements in the attendances array are numbers
    foreach ($attendances as $attendance) {
      if (!is_numeric($attendance)) {
        throw new Exception("One or more attendances are not numbers.");
      }
    }
    $item_attendances = array();
    for ($i = 0; $i < count($items); $i++) {
      $item_attendances_array = array("item"=>$items[$i], "attendance"=>$attendances[$i]);
      array_push($item_attendances,$item_attendances_array);
    }

    usort($item_attendances, function($a, $b) {
          return $b['attendance'] <=> $a['attendance'];
    });

    return $item_attendances;
  } catch (Exception $e) {
    return "Error: ".$e->getMessage();
  }
}
