<?php


abstract class Sequence
{
  /**
   * @param string $item
   */
  abstract public function put(string $item) : void;

  /**
   * @return string|null
   */
  abstract public function get() : ?string ;

  /**
   * @return mixed
   */
  abstract protected function getFirst();

  /**
   * @return bool
   */
  public function isEmpty(){
    return $this->getFirst() === null;
  }

  /**
   * @return iterable
   */
  public function getList() : iterable
  {
    $current = $this->getFirst();
    while ($current !== null){
      yield $current->getItem();
      $current = $current->getNext();
    }
  }

  /**
   * @param string $item
   * @return bool
   */
  public function contains(string $item) :bool
  {
    foreach ($this->getList() as $current){
      if($current === $item){
        return true;
      }
    }
    return false;
  }
}
