<?php



class CoreDatabase {
  protected $db = null;
  function init() {
    $cfg = Config::getDatabaseConfig();
    $thisCfg = $cfg[Config::getEnvironment()];
    
    $driver = Config::getDatabaseDriver();
    $host = $thisCfg['hostname'];
    $database = $thisCfg['database'];
    $username = $thisCfg['username'];
    $password = $thisCfg['password'];
    try {
      $this->db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    } catch(exception $e) {
      echo $e->getMessage();
    }
  }
  
  function getDb() {
    return $this->db;
  }
}
