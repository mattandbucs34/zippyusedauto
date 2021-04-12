<?php
  require('../../models/makes_db.php');
  require('../../models/database.php');
  require_once('../util/valid_admin.php');

  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
      $action = 'show_makes_list';
    }
  }

  if(!check_valid_admin()) {
    header("Location: ../?action=show_login");
  }

  switch($action) {
    case 'show_makes_list':
      $makes = getDistinctMakes();
      include('make_list.php');
    break;
    case 'add_new_make':
      $makeName = filter_input(INPUT_POST, 'make_name');
      if($makeName == NULL || $makeName == FALSE) {
        $error = "There was an issue getting the data. Please try again.";
        include('../../views/error.php');
      }else {
        addNewMake($makeName);
        header("Location: .");
      }
    break;
    case 'delete_make':
      $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
      if($make_id == NULL || $make_id == FALSE) {
        $error = "The Make you selected is not valid. Please check the information and try again.";
        include('../../views/error.php');
      }else {
        removeClass($make_id);
        header("Location: .");
      }
      break;
  }
?>