<?php
  function getDistinctTypes() {
    global $db;
    $query = 'SELECT DISTINCT * FROM types ORDER BY type';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
  }

  function addNewType($typeName) {
    global $db;
    $query = 'INSERT INTO types (type) VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $typeName);
    $statement->execute();
    $statement->closeCursor();
  }

  function removeType($type_id) {
    global $db;
    $query = 'DELETE FROM types WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
  }
?>