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

  function addNewMake($makeName) {
    global $db;
    $query = 'INSERT INTO makes (make) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $makeName);
    $statement->execute();
    $statement->closeCursor();
  }

  function removeMake($make_id) {
    global $db;
    $query = 'DELETE FROM makes WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
  }
?>