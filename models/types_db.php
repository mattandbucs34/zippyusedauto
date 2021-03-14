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
?>