<?php


namespace framework;

use framework\db\Database;

abstract class Model
{
  /**
   * @var Database
   */
  public Database $db;

  /**
   * Model constructor.
   */
  public function __construct()
  {
    $this->db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
  }

  /**
   * @return string
   */
  abstract protected function getNameClass() :string;

  /**
   * @return string
   */
  protected function getTableName() :string
  {
    return lcfirst(substr(
      $this->getNameClass(),
      strrpos($this->getNameClass(),
        '\\')+1)) . 's';
  }

  /**
   * @return array|null
   */
  public function get() :?array
  {
    $sql = "SELECT * FROM " . $this->getTableName();
    $data = array();
    try {
      $stmt = $this->db->start()->prepare($sql);
      $stmt->execute();
      while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
          $data[] = $row;
      }
      return $data;
    } catch (\PDOException $e) {
      trigger_error('Error: ' . $e->getMessage() . ' Error Code : ' . $e->getCode() . ' <br />' . $sql);
      exit();
    }
  }

  /**
   * @param $id
   * @return array|null
   */
  public function find($id) :?array
  {
    $sql = "SELECT * FROM " . $this->getTableName() . " WHERE id=:id";
    try {
      $stmt = $this->db->start()->prepare($sql);
      $stmt->execute(['id' => $id]);
      return $stmt->fetch(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      trigger_error('Error: ' . $e->getMessage() . ' Error Code : ' . $e->getCode() . ' <br />' . $sql);
      exit();
    }
  }
}
