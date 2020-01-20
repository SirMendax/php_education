<?php
namespace src\Models;

use framework\Model;

class User extends Model
{
  protected function getNameClass(): string
  {
    return __CLASS__;
  }
}
