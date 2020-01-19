<?php


class Graph
{
  /**
   * @var array
   */
  private ?array $edges = null;

  /**
   * Graph constructor.
   */
  public function __construct()
  {
    $this->edges = [];
  }

  /**
   * @param string $node
   */
  public function addNode(string $node)
  {
    $this->edges[$node] = [];
  }

  /**
   * @param string $node_one
   * @param string $node_two
   * @param string $length
   */
  public function addEdge(
    string $node_one,
    string $node_two,
    string $length)
  {
    $this->edges[$node_one][$node_two] = $length;
    $this->edges[$node_two][$node_one] = $length;
  }

  /**
   * @return iterable
   */
  public function getNodes() : iterable
  {
    foreach ($this->edges as $node => $edge) {
      yield $node;
    }
  }

  /**
   * @param string $node_one
   * @return iterable
   */
  public function getEdges(string $node_one) : iterable
  {
    foreach ($this->edges[$node_one] as $node_two => $length) {
      yield $node_two => $length;
    }
  }
}
