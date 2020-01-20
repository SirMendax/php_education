<?php


namespace framework\db;


class Database
{
  /**
   * @var
   */
  private $pdo = null;

  /**
   * @var
   */
  private $statement = null;

  /**
   *  Construct, create opject of PDO class
   */
  public function __construct($hostname, $username, $password, $database, $port)
  {
    try {
      $this->pdo = new \PDO("mysql:host=" . $hostname . ";port=" . $port . ";dbname=" . $database, $username, $password, array(\PDO::ATTR_PERSISTENT => true));
    } catch (\PDOException $e) {
      trigger_error('Error: Could not make a database link ( ' . $e->getMessage() . '). Error Code : ' . $e->getCode() . ' <br />');
      exit();
    }
  }

  public function start()
  {
    return $this->pdo;
  }
}
