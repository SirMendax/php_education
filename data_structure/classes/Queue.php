<?php


class Queue extends Sequence
{

  /**
   * @var Node
   */
  private ?Node $head = null;

  /**
   * @var Node
   */
  private Node $last;

  /**
   * @param string $item
   */
  public function put(string $item): void
  {
    $node = new Node($item);

    if($this->isEmpty())
    {
      $this->head = $node;
      $this->last = $node;
    }else{
      $this->last->setNext($node);
      $this->last = $node;
    }
  }

  /**
   * @return string|null
   */
  public function get(): ?string
  {
    $item = $this->head->getItem();
    $this->head = $this->head->getNext();
    return $item;
  }

  /**
   * @return Node|null
   */
  protected function getFirst() : ?Node
  {
    return $this->head;
  }
}
