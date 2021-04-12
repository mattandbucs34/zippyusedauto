<?php
  require('../../models/classes_db.php');
  require('../../models/database.php');
  require_once('../util/valid_admin.php');

  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
      $action = 'show_class_list';
    }
  }

  if(!check_valid_admin()) {
    header("Location: ../?action=show_login");
  }

  switch($action) {
    case 'show_class_list':
      $classes = getDistinctClasses();
      include('class_list.php');
    break;
    case 'add_new_class':
      $className = filter_input(INPUT_POST, 'class_name');
      if($className == NULL || $className == FALSE) {
        $error = "There was an issue getting the data. Please try again.";
        include('../../views/error.php');
      }else {
        addNewClass($className);
        header("Location: .");
      }
    break;
    case 'delete_class':
      $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
      if($class_id == NULL || $class_id == FALSE) {
        $error = "The Class you selected is not valid. Please check the information and try again.";
        include('../../views/error.php');
      }else {
        removeClass($class_id);
        header("Location: .");
      }
      break;
  }
?>