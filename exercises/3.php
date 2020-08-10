<?php

$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);

foreach ($stack as $val)
  echo $val . PHP_EOL;

xdebug_debug_zval( 'stack' );
