<?php
class ClassesDB {
  public static function getDistinctClasses() {
    $db = Database::getDB();
    $query = 'SELECT DISTINCT * FROM classes ORDER BY class ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
  }

  public static function addNewClass($className) {
    $db = Database::getDB();
    $query = 'INSERT INTO classes (class) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $className);
    $statement->execute();
    $statement->closeCursor();
  }

  public static function removeClass($class_id) {
    $db = Database::getDB();
    $query = 'DELETE FROM classes WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
  }
}
?>