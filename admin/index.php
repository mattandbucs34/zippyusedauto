<?php
  require('../models/database.php');
  require('../models/vehicles_db.php');
  require('../models/classes_db.php');
  require('../models/makes_db.php');
  require('../models/types_db.php');
  // require('./controllers/indexController.php');
  include('../controllers/filtersController.php');
  include('../controllers/sortController.php');
  include('../controllers/adminController.php');
  $prices = array();
  $homePage = 'home';
  $vehiclePage = 'vehicle';
  $makesPage = 'make';
  $typesPage = 'type';
  $classesPage = 'class';
  $currentPage = 'home';

  $action = filter_input(INPUT_POST, 'action');
  if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
      $action = '';
    }
  }
  
  switch($action) {
    case('view_page'):
      $page = filter_input(INPUT_GET, 'page');
      if($page == NULL || $page == FALSE) {
        $page = $homePage;
      }
      if($currentPage != $page) {
        switch($page) {
          case($homePage):
          default:
            $currentPage = $homePage;
            header("Location: .");
          break;
          case($vehiclePage):
            $currentPage = $vehiclePage;
            include('./views/vehicleManagement.php');
          break;
          case($makesPage):
            $currentPage = $makesPage;
            include('./views/makesManagement.php');
          break;
          case($typesPage):
            $currentPage = $typesPage;
            include('./views/typesManagement.php');
          break;
          case($classesPage):
            $classes = getDistinctClasses();
            $currentPage = $classesPage;
            include('./views/classesManagement.php');
            // header("Location: .?page=$classesPage");
          break;
        }
      }
    case('select_page'):
      if(isset($_POST['nav_button'])) {
        $page = filter_input(INPUT_POST, 'nav_button');
        if($currentPage != $page) {
          switch($page) {
            case($homePage):
            default:
              $currentPage = $homePage;
              // header("Location: .");
              include('index.php');
            break;
            case($vehiclePage):
              $currentPage = $vehiclePage;
              include('./views/vehicleManagement.php');
            break;
            case($makesPage):
              $currentPage = $makesPage;
              include('./views/makesManagement.php');
            break;
            case($typesPage):
              $currentPage = $typesPage;
              include('./views/typesManagement.php');
            break;
            case($classesPage):
              $classes = getDistinctClasses();
              $currentPage = $classesPage;
              // include('./views/classesManagement.php');
              header("Location: .?action=view_page&page=$classesPage");
            break;
          }
        }
      }
    break;
    case('delete_vehicle'):
      if(isset($_POST['delete_vehicle'])) {
        $vehicleID = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        $makeID = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        $typeID = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $classID = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        if($vehicleID == NULL || $vehicleID == FALSE || $makeID == NULL || $makeID == FALSE || $typeID == NULL || $typeID == FALSE || $classID == NULL || $classID == FALSE) {
          $error = "The ID you selected is not valid";
          include('../views/error.php');
        }else {
          removeVehicle($vehicleID);
          header("Location: .");
        }
      }
    break;
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
    break;
    default:
      $vehicles = getAllVehicles();
      $currentPage = $homePage; 
    break;
  }
  
  $years = getDistinctYears();
  $classes = getDistinctClasses();
  $makes = getDistinctMakes();
  $types = getDistinctTypes();
?>


<?php include('./views/indexHeader.php') ?>

  <main>
    <?php include('../views/filterSidebar.php') ?>
    <div class="admin-container">
      <?php include('./views/indexNav.php') ?>
      <?php include('./views/vehicleList.php') ?>
    </div>
  </main>
<?php include('../views/footer.php') ?>
