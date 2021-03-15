<?php
  require('../../models/types_db.php');
  require('../../models/database.php');

  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
      $action = 'show_types_list';
    }
  }

  switch($action) {
    case 'show_types_list':
      $types = getDistinctTypes();
      include('type_list.php');
    break;
    case 'add_new_type':
      $typeName = filter_input(INPUT_POST, 'type_name');
      if($typeName == NULL || $typeName == FALSE) {
        $error = "There was an issue getting the data. Please try again.";
        include('../../views/error.php');
      }else {
        addNewType($typeName);
        header("Location: .");
      }
    break;
    case 'delete_type':
      $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
      if($type_id == NULL || $type_id == FALSE) {
        $error = "The Type you selected is not valid. Please check the information and try again.";
        include('../../views/error.php');
      }else {
        removeType($type_id);
        header("Location: .");
      }
      break;
  }
?>