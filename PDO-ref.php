<?php  function getPDO() {
    $host = "localhost";
    $db   = "ork24002898";
    $user = "ork24002898";
    $pass = "amber-cliff-saddle";
  
    $dsn = "mysql:host=$host;dbname=$db;";
  
    try {
      $pdo = new PDO($dsn, $user, $pass);
  
      // Turn on error reporting
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      // Set default fetch mode to associative arrays
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  
      return $pdo;  
    } 
    catch (PDOException $e) {
      // Handle any connection error
      throw $e;
    }
  } 
function executeSQL($sql, $pdo) {
    $statement = $pdo->prepare($sql);
    
    $statement->execute();
    
    return $statement->fetchAll();
}
?>