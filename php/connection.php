<?php
class Connection{
  private $host, $user, $pass, $database, $charset, $driver;
  
  public function __construct() {
    $dbcfg = require('secrets.php');

    $this->setHost($dbcfg['host']);
    $this->setUser($dbcfg['user']);
    $this->setPass($dbcfg['pass']);
    $this->setDatabase($dbcfg['database']);
    $this->setCharset($dbcfg['charset']);
    $this->setDriver($dbcfg['driver']);
  }
  
  function getHost() {
    return $this->host;
  }
  
  function getUser() {
    return $this->user;
  }
  
  function getPass() {
    return $this->pass;
  }
  
  function getDatabase() {
    return $this->database;
  }
  
  function getCharset() {
    return $this->charset;
  }
  
  function getDriver() {
    return $this->driver;
  }
  
  function getDsn() {
    return $this->dsn;
  }
  
  function setHost($host) {
    $this->host = $host;
  }
  
  function setUser($user) {
    $this->user = $user;
  }
  
  function setPass($pass) {
    $this->pass = $pass;
  }
  
  function setDatabase($database) {
    $this->database = $database;
  }
  
  function setCharset($charset) {
    $this->charset = $charset;
  }
  
  function setDriver($driver) {
    $this->driver = $driver;
  }
  
  function setDsn($dsn) {
    $this->dsn = $dsn;
  }
  
  public function getConnection() {
    $dsn = $this->getDriver().":host=".$this->getHost().";dbname=".$this->getDatabase().";charset=".$this->getCharset().";";
    
    $opt = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false
    ];

    $STDERR = fopen("php://stderr", "w");
    fwrite($STDERR, "\n".$dsn."\n\n");
    fclose($STDERR);
    
    $db = new PDO($dsn, $this->getUser(), $this->getPass(), $opt);
    $db->exec("set names utf8");
    return $db;            
  }        
}
?>
