<?php
  require('../../models/database.php');
  require('../../models/classes_db.php');
  require('../../models/makes_db.php');
  require('../../models/types_db.php');
  require('../../models/vehicles_db.php');

  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
      $action = 'get_page_data';
    }
  }

  switch($action) {
    case 'get_page_data':
      $classes = getDistinctClasses();
      $makes = getDistinctMakes();
      $types = getDistinctTypes();
      $years = array_combine(range(date("Y"), 1988), range(date("Y"), 1988));
      include('new_vehicle.php');
      break;
  }
?>