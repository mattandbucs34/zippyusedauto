<?php
  require('../../models/database.php');
  require('../../models/classes_db.php');
  require('../../models/makes_db.php');
  require('../../models/types_db.php');
  require('../../models/vehicles_db.php');
  require_once('../util/valid_admin.php');

  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
      $action = 'get_page_data';
    }
  }

  if(!check_valid_admin()) {
    header("Location: ../?action=show_login");
  }

  switch($action) {
    case 'get_page_data':
      $classes = getDistinctClasses();
      $makes = getDistinctMakes();
      $types = getDistinctTypes();
      $years = array_combine(range(date("Y"), 1988), range(date("Y"), 1988));
      include('new_vehicle.php');
      break;
    case 'add_vehicle':
      $model_year = filter_input(INPUT_POST, 'model_year', FILTER_VALIDATE_INT);
      $make = filter_input(INPUT_POST, 'make_select');
      $model = filter_input(INPUT_POST, 'model_name');
      $price = filter_input(INPUT_POST, 'price');
      $class = filter_input(INPUT_POST, 'class_select', FILTER_VALIDATE_INT);
      $type = filter_input(INPUT_POST, 'type_select', FILTER_VALIDATE_INT);

      if($model_year == NULL || $model_year == FALSE
        || $make == NULL || $make == FALSE
        || $model == NULL || $model == FALSE
        || $price == NULL || $price == FALSE
        || $class == NULL || $class == FALSE
        || $type == NULL || $type == FALSE
      ){
        $error = "Inputs are invalid. Please check your form and try again.";
        include('../../views/error.php');
      }else {
        VehiclesDB::addVehicle($model_year, $make, $model, $price, $class, $type);
        header("Location: .");
      }
    break;
    default:
    break;
  }
?>