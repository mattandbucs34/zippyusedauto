<?php
  function getFinalQuery($prices, $years, $make, $type, $class) {
    $query = "";
    $strArray = array($prices, $years, $make, $type, $class);
    if(strlen($prices) > 0 || strlen($years) > 0 || strlen($make) > 0 || strlen($type) > 0 || strlen($class) > 0){
      $query = "WHERE ";
    }
    $isFirst = true;
    foreach($strArray as $str) {
      if(strlen($str) > 0) {
        if($isFirst) {
          $isFirst = false;
          $query = "$query ($str)";
        }else {
          $query = "$query AND ($str)";
        }
      }
    }

    return $query;
  }

  function getPriceList() {
    $prices = array();
    if(!empty($_POST['price_select'])) {
      foreach($_POST['price_select'] as $selected) {
        $price = filter_var($selected, FILTER_VALIDATE_INT);
        array_push($prices, $price);
      }
    }
    return $prices;
  }

  function getYearsList() {
    $years = array();
    if(!empty($_POST['year_select'])) {
      foreach($_POST['year_select'] as $selected) {
        $year = filter_var($selected, FILTER_VALIDATE_INT);
        array_push($years, $year);
      }
    }
    return $years;
  }

  function getMakeList() {
    $makes = array();
    if(!empty($_POST['make_select'])) {
      foreach($_POST['make_select'] as $selected) {
        $make = filter_var($selected, FILTER_VALIDATE_INT);
        array_push($makes, $make);
      }
    }
    return $makes;
  }

  function getTypesList() {
    $types = array();
    if(!empty($_POST['types_select'])) {
      foreach($_POST['types_select'] as $selected) {
        $type = filter_var($selected, FILTER_VALIDATE_INT);
        array_push($types, $type);
      }
    }
    return $types;
  }

  function getClassesList() {
    $classes = array();
    if(!empty($_POST['classes_select'])) {
      foreach($_POST['classes_select'] as $selected) {
        $class = filter_var($selected, FILTER_VALIDATE_INT);
        array_push($classes, $class);
      }
    }
    return $classes;
  }

  function getPriceQueryString($prices) {
    $str="";
    if(!empty($prices)) {
      $str = setPriceQueryString($prices[0]);
      if(count($prices) == 1) {
        return $str;
      }else {
        for($i = 1; $i < count($prices); $i++) {
          $eval = setPriceQueryString($prices[$i]);
          $str = $str . " OR " . $eval . " ";
        }
        return $str;
      }
    }
  }
  
  function getYearQueryString($years) {
    $query = "";
    if(!empty($years)) {
      $query = "year = " . $years[0];
      if(count($years) > 1) {
        for($i = 1; $i < count($years); $i++) {
          $query = $query . " OR " . "year = " . $years[$i];
        }
      }
    }
    return $query;
  }

  function getMakesQueryString($makes) {
    $query = "";
    if(!empty($makes)) {
      $query = "m.make_id = " . $makes[0];
      if(count($makes) > 1) {
        for($i = 1; $i < count($makes); $i++) {
          $query = "$query OR m.make_id = " . $makes[$i];
        }
      }
    }
    return $query;
  }

  function getTypesQueryString($types) {
    $query = "";
    if(!empty($types)) {
      $query = "t.type_id = " . $types[0];
      if(count($types) > 1) {
        for($i = 1; $i < count($types); $i++) {
          $query = "$query OR t.type_id = " . $types[$i];
        }
      }
    }
    return $query;
  }

  function getClassesQueryString($classes) {
    $query = "";
    if(!empty($classes)) {
      $query = "c.class_id = " . $classes[0];
      if(count($classes) > 1) {
        for($i = 1; $i < count($classes); $i++) {
          $query = "$query OR c.class_id = " . $classes[$i];
        }
      }
    }
    return $query;
  }

  function setPriceQueryString($price) {
    $str = "";
    switch($price) {
      case 100:
        $str = "price > 100000";
      break;
      case 75:
        $str = "price >= 75000 AND price < 100000";
      break;
      case 50:
        $str = "price >= 50000 AND price < 75000";
      break;
      case 25:
        $str = "price >= 25000 AND price < 50000";
      break;
      case 10:
        $str = "price >= 10000 AND price < 25000";
      break;
      case 9:
        $str = "price > 0 AND price < 10000";
      break;
      default:
        $str = "price > 0";
      break;
    }
    return $str;
  }
?>