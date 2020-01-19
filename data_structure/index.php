<?php

include 'classes/Node.php';
include 'classes/Sequence.php';
include 'classes/Stack.php';
include 'classes/Queue.php';
include 'classes/Graph.php';
include 'classes/Walker.php';

echo "================Stack=====================" . PHP_EOL;

$stack = new Stack();
$stack->put("Apple");
$stack->put("Orange");
$stack->put("Pear");

echo $stack->get() . PHP_EOL;
echo $stack->get() . PHP_EOL;
echo $stack->get() . PHP_EOL;

echo "================Queue=====================" . PHP_EOL;

$queue = new Queue();

$queue->put("Apple");
$queue->put("Orange");
$queue->put("Pear");

foreach ($queue->getList() as $item)
{
  echo $item . PHP_EOL;
}

echo "================Graph=====================" . PHP_EOL;

$graph = new Graph();

$graph->addNode('A');
$graph->addNode('B');
$graph->addNode('C');
$graph->addNode('D');
$graph->addNode('E');
$graph->addNode('F');
$graph->addNode('G');

$graph->addEdge('A', 'B', 2);
$graph->addEdge('A', 'C', 3);
$graph->addEdge('A', 'D', 6);
$graph->addEdge('B', 'C', 4);
$graph->addEdge('B', 'E', 9);
$graph->addEdge('C', 'D', 1);
$graph->addEdge('C', 'E', 7);
$graph->addEdge('C', 'F', 6);
$graph->addEdge('D', 'F', 4);
$graph->addEdge('E', 'F', 1);
$graph->addEdge('E', 'G', 5);
$graph->addEdge('F', 'G', 8);

foreach ($graph->getNodes() as $node) {
  echo $node . PHP_EOL;
}

$node_one = 'A';
foreach ($graph->getEdges($node_one) as $node_two => $length) {
  echo $node_one . "<->" . $node_two . " " . $length . PHP_EOL;
}

$walker = new Walker($graph);
$walker->walkDepth('C');
print_r($walker->path);
print_r($walker->walk('C', new Queue()));



