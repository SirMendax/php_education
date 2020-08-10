<?php

function solution(string $roman)
{
  $number = 0;
  $arr = str_split($roman);
  foreach ($arr as $key => $symbol) {
    if ($key < count($arr) - 1) {
      if (dictionary($arr[$key]) < dictionary($arr[$key + 1])) $number -= dictionary($symbol);
      else $number += dictionary($symbol);
    } else {
      $number += dictionary($symbol);
    }
  }
  return (int)$number;
}

function dictionary(string $symbol)
{
  $array = [
    'I' => 1,
    'V' => 5,
    'X' => 10,
    'L' => 50,
    'C' => 100,
    'D' => 500,
    'M' => 1000
  ];
  return $array[$symbol];
}

