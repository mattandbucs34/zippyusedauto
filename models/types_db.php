<?php
class TypesDB {
  public static function getDistinctTypes() {
    $db = Database::getDB();
    $query = 'SELECT DISTINCT * FROM types ORDER BY type';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
  }

  public static function addNewType($typeName) {
    $db = Database::getDB();
    $query = 'INSERT INTO types (type) VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $typeName);
    $statement->execute();
    $statement->closeCursor();
  }

  public static function removeType($type_id) {
    $db = Database::getDB();
    $query = 'DELETE FROM types WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
  }
}
?>