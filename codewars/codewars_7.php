<?php

function findShort($str){
  //return min(array_map('strlen', (explode(' ', $str))));
  $arr = explode(' ', $str);
  $newArr = [];
  foreach ($arr as $item){
    $newArr[$item] = strlen($item);
  }
  return min($newArr);
}

