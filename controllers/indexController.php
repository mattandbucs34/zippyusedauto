<?php

  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
      $action = 'full_list';
    }
  }
  
  switch($action) {
    case ('sort_by_price') :
      $sortedBy = filter_input(INPUT_POST, 'sort_decision', FILTER_VALIDATE_INT);
      
      $str = getSortString($sortedBy);
      if($str == NULL || $str == FALSE) {
        $error = "That's just wrong";
        include('./views/error.php');
      }
      $vehicles = sortVehicles($str);
      // header("Location: .?sortedBy=$sortedBy");
      // include('index.php');
      break;
    case('full_list');
    default: {
      $sortedBy = filter_input(INPUT_GET, 'sort_decision', FILTER_VALIDATE_INT);
      if($sortedBy == NULL || $sortedBy == FALSE) {
        $vehicles = getAllVehicles();
        $str = $sortedBy;
      }else {
        $str = getSortString($sortedBy);
        $vehicles = sortVehicles($str);
        // header("Location: .?sortedBy=$sortedBy");
      }
      break;
    }
  }

  function getSortString($sortedBy) {
    if($sortedBy == 1 || $sortedBy == 2) {
      $sortCat = 'price';
    }else {
      $sortCat = 'year';
    }

    if($sortedBy == 1 || $sortedBy == 3) {
      $direction = 'DESC';
    }else {
      $direction = 'ASC';
    }

    $str = "ORDER BY $sortCat $direction";
    return $str;
  }
?>