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

  function filterVehicles($str) {
    global $db;
    $query = "SELECT * FROM vehicles INNER JOIN types t ON t.type_id = vehicles.type_id INNER JOIN makes m ON m.make_id = vehicles.make_id INNER JOIN classes c ON c.class_id = vehicles.class_id $str ORDER BY price DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $filtered = $statement->fetchAll();
    $statement->closeCursor();
    return $filtered;
  }

  function removeVehicle($vehicleID) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicleID);
    $statement->execute();
    $statement->closeCursor();
  }

  function addVehicle($model_year, $make, $model, $price, $class, $type) {
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES (:model_year, :model, :price, :type_id, :class_id, :make_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':model_year', $model_year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type);
    $statement->bindValue(':class_id', $class);
    $statement->bindValue(':make_id', $make);
    $statement->execute();
    $statement->closeCursor();
  }
?>