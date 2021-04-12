<?php
  $dsn = 'mysql:host=xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=p34n2tuedpgxjhka';
  $username = 'nm1jisgbn5lvo5ok';
  $password = 'ev83cyk2ajvggygq';

  try {
    $db = new PDO($dsn, $username, $password);
  }catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
  }
?>

