<?php

$arr = [1, 2, 4, 61, 534, 33, 45, 14, 10, 25];

echo 'Четные значения элементов' . PHP_EOL;
foreach ($arr as $val)
{
  if($val % 2 === 0) echo $val . PHP_EOL;
}

echo 'Четные элементы' . PHP_EOL;
foreach ($arr as $key => $val)
{
  if((($key+1) % 2) === 0) echo $val . PHP_EOL;
}

echo 'Элементы с четными ключами' . PHP_EOL;
foreach ($arr as $key => $val)
{
  if($key !== 0 and $key % 2 === 0) echo $val . PHP_EOL;
}

function even_el(array &$arr)
{
  foreach ($arr as $key => $val)
  {
    if($key === 0 or $key % 2 !== 0) unset($arr[$key]);
  }
}

even_el($arr);
echo 'Масств из четных элементов' . PHP_EOL;
var_dump($arr);
echo 'Произведение четных элементов' . PHP_EOL;
var_dump(array_product($arr));
