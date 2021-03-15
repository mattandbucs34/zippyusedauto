<?php
  function getDistinctClasses() {
    global $db;
    $query = 'SELECT DISTINCT * FROM classes ORDER BY class ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
  }

  function addNewClass($className) {
    global $db;
    $query = 'INSERT INTO classes (class) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $className);
    $statement->execute();
    $statement->closeCursor();
  }

  function removeClass($class_id) {
    global $db;
    $query = 'DELETE FROM classes WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
  }
?>