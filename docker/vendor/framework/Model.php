<?php


namespace framework;


use framework\db\Database;

class Model
{

  /**
   * @var Database
   */
  public Database $db;

  /**
   * Model constructor.
   */
  public function __construct() {
    $this->db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
  }
}
