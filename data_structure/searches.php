<?php

include 'classes/Node.php';
include 'classes/Sequence.php';
include 'classes/Stack.php';
include 'classes/Queue.php';
include 'classes/Graph.php';
include 'classes/Walker.php';

$graph = new Graph();

for($x = 0; $x < 8; $x++){
  for($y = 0; $y < 8; $y++){
    $graph->addNode("$x$y");
  }
}

for($x = 0; $x < 8; $x++)
  for($y = 0; $y < 8; $y++)
    for($sx = 0; $sx <= 1; $sx++)
    {
      $sy = 1 - $sx;
      if($x + $sx < 8)
        if($y + $sy < 8)
          $graph->addEdge("$x$y", ($x+$sx) . ($y+$sy), 1);
    }

$node = "44";
$seq = new Queue();
$walker = new Walker($graph);
$walker->walk($node, $seq);

function show(array $path, Sequence $sequence)
{
  for($x = 0; $x < 8; $x++)
  {
    for($y = 0; $y < 8; $y++){
      if(array_key_exists("$x$y", $path)) echo "$x$y";
      elseif($sequence->contains("$x$y")) echo "++";
      else echo "..";
    }
    echo PHP_EOL;
  }
  foreach ($sequence->getList() as $item)
    echo $item;
  echo PHP_EOL;
}
