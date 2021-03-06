<?php
  $sortedBy = 1;
  if(isset($_POST['sort_decision'])) {
    $sortedBy = filter_input(INPUT_POST, 'sort_decision', FILTER_VALIDATE_INT);
  
    if($sortedBy == NULL || $sortedBy == FALSE) {
      $str = "";
    }else {
      $str = getSortString($sortedBy);
      $vehicles = VehiclesDB::sortVehicles($str);
    }
  }

  function getSortString($sortedBy) {
    switch($sortedBy) {
      case 1:
        $str = "ORDER BY price DESC";
        break;
      case 2:
        $str = "ORDER BY price ASC";
        break;
      case 3:
        $str = "ORDER BY year DESC, price DESC";
        break;
      case 4:
        $str = "ORDER BY year ASC, price DESC";
        break;
      default:
        $str = "";
    }
    return $str;
  }
?>