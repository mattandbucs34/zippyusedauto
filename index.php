<?php
  require('./models/database.php');
  require('./models/vehicles_db.php');
  require('./models/classes_db.php');
  require('./models/makes_db.php');
  require('./models/types_db.php');
  // require('./controllers/indexController.php');

  $action = filter_input(INPUT_POST, 'action');
  $vehicles = getAllVehicles();
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