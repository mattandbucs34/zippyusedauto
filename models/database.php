<?php
class Database {
  private static $dsn = 'mysql:host=xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=p34n2tuedpgxjhka';
  private static $username = 'nm1jisgbn5lvo5ok';
  private static $password = 'ev83cyk2ajvggygq';
  private static $db;

  private function __construct() 
  {
    
  }

  public static function getDB() {
    if(!isset(self::$db)) {
      try {
        self::$db = new PDO(self::$dsn, self::$username, self::$password);
      }catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
      }
    }
    return self::$db;
  }
}
?>

