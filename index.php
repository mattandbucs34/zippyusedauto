<?php
  $lifetime = 60 * 60 * 24 * 14; //cookie lifetime of 2 weeks
  session_set_cookie_params($lifetime, '/');
  $_COOKIE["screenWidth"];
  session_start();
  $_SESSION['is_valid_admin'] = false;

  //include database functions
  require('./models/database.php');
  require('./models/vehicles_db.php');
  require('./models/classes_db.php');
  require('./models/makes_db.php');
  require('./models/types_db.php');

  //include controller functions
  // require('./controllers/indexController.php');
  include('./controllers/filtersController.php');
  include('./controllers/sortController.php');
  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
      $action == "";
    }
  }

  $firstName = filter_input(INPUT_GET, 'first_name');
  $userID = FALSE;
  if($firstName != NULL) {
    $_SESSION['userid'] = $firstName;
    $userID = $_SESSION['userid'];
  }

  $prices = array();
  switch($action) {
    case 'register':
      include('./views/register.php');
      // header("Location: ./views/register.php");
    break;
    case('logout'):
      include('./views/logout.php');
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
        $vehicles = VehiclesDB::getAllVehicles();  
      }else {
        $vehicles = VehiclesDB::filterVehicles($str);
      }
      $years = VehiclesDB::getDistinctYears();
      $classes = ClassesDB::getDistinctClasses();
      $makes = MakesDB::getDistinctMakes();
      $types = TypesDB::getDistinctTypes();
      include("./views/home.php");
    break;
    default:
      $vehicles = VehiclesDB::getAllVehicles();
      $years = VehiclesDB::getDistinctYears();
      $classes = ClassesDB::getDistinctClasses();
      $makes = MakesDB::getDistinctMakes();
      $types = TypesDB::getDistinctTypes();
      include('./views/home.php');
    break;
  }
?>