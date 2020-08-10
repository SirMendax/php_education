<?php

function findIt(array $seq)
{
  $arr = array_count_values($seq);
  foreach ($arr as $k => $v){
    if($v%2 !== 0) return $k;
  }
}

var_dump(findIt([20,1,-1,2,-2,3,3,5,5,1,2,4,20,4,-1,-2,5]));
