<?php
  function getDistinctMakes() {
    global $db;
    $query = 'SELECT DISTINCT * FROM makes ORDER BY make ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
  }
?>