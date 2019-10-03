<?php

  
  require_once('config.php');

  # Create a re-usable PDO object
  # Should we check for a certain type of error here?
  #charset
  $db = new PDO(
    'mysql:host=' . Config::DB_HOST . ';
    dbname=' . Config::DB_DB_NAME . ';
    charset=utf8mb4',
    Config::DB_USER,
    Config::DB_PASS,
    Config::PDO_CONFIG
  );

  return $db;

?>