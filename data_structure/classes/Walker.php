<?php


class Walker
{
  /**
   * @var Graph
   */
  private Graph $graph;

  public ?array $path = null;
  /**
   * Walker constructor.
   * @param Graph $graph
   */
  public function __construct(Graph $graph)
  {
    $this->graph = $graph;
    $this->path = [];
  }

  /**
   * @param string $node
   */
  public function walkDepth(string $node)
  {
    $this->path[$node] = true;
    foreach ($this->graph->getEdges($node) as $node_two => $length)
    {
      if(!array_key_exists($node_two, $this->path)){
        $this->walkDepth($node_two);
      }
    }
  }

  public function walk(string $node, Sequence $sequence)
  {
    $path = [];
    $sequence->put($node);
    //show($path, $sequence);
    while (!$sequence->isEmpty())
    {
      $current = $sequence->get();
      $path[$current] = true;
      foreach ($this->graph->getEdges($current) as $next => $length)
        if(!array_key_exists($next, $path))
          if(!$sequence->contains($next))
            $sequence->put($next);
      //show($path, $sequence);
    }
    return $path;
  }
}
