<?php

$inputStr = 'abacabad';

//first step
$arr = str_split($inputStr);
$symbolRate = array_count_values($arr);
$numberUniqueSymbol = count($symbolRate);

$pq = new SplPriorityQueue();
foreach($symbolRate as $k=>$v){
  $pq->insert($k, $v);
}

var_dump($pq);

//second step


/*
 * a - 4
 * b - 2
 * c - 1
 * d - 1
 *
 * next step
 *
 * d, c, b, a
 *
 * next step
 *
 * d + c  = 2 - первый узел
 *
 * (d + c) + b = 4 - второй узел
 *
 * ((d+c)+b) + a = 8 - третий узел
 *
 * a = 0
 * b = 10
 * c = 110
 * d = 111
 *
 */
