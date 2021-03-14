<?php
  require('./models/database.php');
  require('./models/vehicles_db.php');
  require('./models/classes_db.php');
  require('./models/makes_db.php');
  require('./models/types_db.php');
  // require('./controllers/indexController.php');
  include('./controllers/filtersController.php');
  include('./controllers/sortController.php');
  $action = filter_input(INPUT_POST, 'action');
  $prices = array();
  // print_r($action);
  switch($action) {
    case('sort_by_value'):
      
    break;
    case('select_filter'):
      $prices = getPriceList();
      $selectedYears = getYearsList();
      $selectedMakes = getMakeList();
      $selectedTypes = getTypesList();
      $selectedClasses = getClassesList();
      $priceEval = "";
      $yearEval = "";
      $makesEval = "";
      $typesEval = "";
      $classEval = "";
      
      if(!empty($prices)) {
        $priceEval = getPriceQueryString($prices);
      }

      if(!empty($selectedYears)) {
        $yearEval = getYearQueryString($selectedYears);
      }

      if(!empty($selectedMakes)) {
        $makesEval = getMakesQueryString($selectedMakes);
      }

      if(!empty($selectedTypes)) {
        $typesEval = getTypesQueryString($selectedTypes);
      }

      if(!empty($selectedClasses)) {
        $classEval = getClassesQueryString($selectedClasses);
      }
      
      $str = getFinalQuery($priceEval, $yearEval, $makesEval, $typesEval, $classEval);
      
      if(strlen($str) == 0) {
        $vehicles = getAllVehicles();  
      }else {
        $vehicles = filterVehicles($str);
      }

      
      
      // if($priceEval == NULL || $priceEval == FALSE) {
      //   $error = "Something went wrong.";
      //   include('./views/error.php');
      //   $vehicles = getAllVehicles();
      // } else {
      //   $priceEval = "WHERE $priceEval";
        
      // }
    break;
    default:
      $vehicles = getAllVehicles();
    break;
  }
  
  $years = getDistinctYears();
  $classes = getDistinctClasses();
  $makes = getDistinctMakes();
  $types = getDistinctTypes();
?>

<!DOCTYPE html>
<html lang="en">
<?php include('head.php') ?>
<body>
  <?php include('./views/header.php') ?>
  <main>
    <?php include('./views/filterSidebar.php') ?>
    <?php include('./views/vehicleList.php') ?>
  </main>
  <?php include('./views/footer.php') ?>
</body>
</html>