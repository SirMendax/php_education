<?php


namespace src\Models;


use framework\Model;

class Test extends Model
{
  public function get($sql){
    return $this->db->query($sql);
  }
}
