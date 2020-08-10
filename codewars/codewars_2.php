<?php

function countBits($n)
{
  if($n === 0) return 0;
  if($n < 0) return false;
  $bitNum = decbin($n);
  $chars = preg_split('//', $bitNum, -1, PREG_SPLIT_NO_EMPTY);
  $arr = array_count_values($chars);
  return $arr[1];
}

echo countBits(0);
