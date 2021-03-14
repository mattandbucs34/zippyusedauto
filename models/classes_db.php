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
?>