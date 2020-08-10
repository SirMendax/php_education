<?php

function descendingOrder(int $n): int
{
  $str = str_split($n);
  rsort($str);
  return (int)implode('', $str);
}
