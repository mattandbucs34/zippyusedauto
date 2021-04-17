<?php
class MakesDB {
  public static function getDistinctMakes() {
    $db = Database::getDB();
    $query = 'SELECT DISTINCT * FROM makes ORDER BY make ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
  }

  public static function addNewMake($makeName) {
    $db = Database::getDB();
    $query = 'INSERT INTO makes (make) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $makeName);
    $statement->execute();
    $statement->closeCursor();
  }

  public static function removeMake($make_id) {
    $db = Database::getDB();
    $query = 'DELETE FROM makes WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
  }
}
?>