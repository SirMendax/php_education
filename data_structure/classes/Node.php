<?php


class Node
{
  /**
   * @var string
   */
  private string $item;

  /**
   * @var Node
   */
  private ?Node $next = null;

  /**
   * Node constructor.
   * @param string $item
   * @param Node|null $next
   */
  public function __construct(string $item, ?Node $next = null)
  {
    $this->item = $item;
    $this->next = $next;
  }

  /**
   * @return string
   */
  public function getItem() :string
  {
    return $this->item;
  }

  /**
   * @return Node|null
   */
  public function getNext() : ?Node
  {
    return $this->next;
  }

  /**
   * @param Node $node
   */
  public function setNext(Node $node) :void
  {
    $this->next = $node;
  }
}
