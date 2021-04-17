<?php
class VehiclesDB {
  public static function getAllVehicles() {
    $db = Database::getDB();
    $query = 'SELECT * FROM vehicles INNER JOIN types t ON t.type_id = vehicles.type_id INNER JOIN makes m ON m.make_id = vehicles.make_id INNER JOIN classes c ON c.class_id = vehicles.class_id ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
  }

  public static function getDistinctYears() {
    $db = Database::getDB();
    $query = "SELECT DISTINCT year FROM vehicles ORDER BY year DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $years = $statement->fetchAll();
    $statement->closeCursor();
    return $years;
  }

  public static function sortVehicles($direction) {
    $db = Database::getDB();
    $query = "SELECT * FROM vehicles INNER JOIN types t ON t.type_id = vehicles.type_id INNER JOIN makes m ON m.make_id = vehicles.make_id INNER JOIN classes c ON c.class_id = vehicles.class_id $direction" ;
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
  }

  public static function filterVehicles($str) {
    $db = Database::getDB();
    $query = "SELECT * FROM vehicles INNER JOIN types t ON t.type_id = vehicles.type_id INNER JOIN makes m ON m.make_id = vehicles.make_id INNER JOIN classes c ON c.class_id = vehicles.class_id $str ORDER BY price DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $filtered = $statement->fetchAll();
    $statement->closeCursor();
    return $filtered;
  }

  public static function removeVehicle($vehicleID) {
    $db = Database::getDB();
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicleID);
    $statement->execute();
    $statement->closeCursor();
  }

  public static function addVehicle($model_year, $make, $model, $price, $class, $type) {
    $db = Database::getDB();
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
}
?>