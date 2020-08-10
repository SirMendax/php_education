<?php

class Stack extends Sequence
{
  /**
   * @var Node|null
   */
  private ?Node $last;

  /**
   * Stack constructor.
   */
  public function __construct()
  {
    $this->last = null;
  }

  /**
   * @param string $item
   */
  public function put(string $item) :void
  {
    $this->last = new Node($item, $this->last);
  }

  /**
   * @return string|null
   * @throws Exception
   */
  public function get() :?string
  {
    if($this->isEmpty()) throw new Exception("Stack is empty");
    $item = $this->last->getItem();
    $this->last = $this->last->getNext();
    return $item;
  }

  /**
   * @return Node|null
   */
  protected function getFirst() : ?Node
  {
    return $this->last;
  }
}
