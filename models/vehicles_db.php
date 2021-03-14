<?php 
  function getAllVehicles() {
    global $db;
    $query = 'SELECT * FROM vehicles INNER JOIN types t ON t.type_id = vehicles.type_id INNER JOIN makes m ON m.make_id = vehicles.make_id INNER JOIN classes c ON c.class_id = vehicles.class_id ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
  }

  function getDistinctYears() {
    global $db;
    $query = "SELECT DISTINCT year FROM vehicles ORDER BY year DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $years = $statement->fetchAll();
    $statement->closeCursor();
    return $years;
  }

  function sortVehicles($direction) {
    global $db;
    $query = "SELECT * FROM vehicles INNER JOIN types t ON t.type_id = vehicles.type_id INNER JOIN makes m ON m.make_id = vehicles.make_id INNER JOIN classes c ON c.class_id = vehicles.class_id $direction" ;
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
  }
?>