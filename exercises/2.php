<?php

$a = 12;
$b = 5;
list($b, $a) = array($a, $b);
var_dump($a, $b);

$x=10;
$y=15;
$x=$x+$y;
$y=$x-$y;
$x=$x-$y;
echo "x = $x" . PHP_EOL . "y = $y" . PHP_EOL;

$x1 = 11;
$y1 = 12;

$x1 ^= $y1;
$y1 ^= $x1;
$x1 ^= $y1;

echo  'x1=' . $x1 . PHP_EOL . 'y1=' . $y1 . PHP_EOL;
