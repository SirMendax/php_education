<?php
/*
 * В первой строке даны целое число 1≤n≤10^5 A[1, n],
 * и массив A[1…n] из n различных натуральных чисел, не превышающих 10^9,
 * в порядке возрастания, во второй — целое число 1≤k≤10^5 и k натуральных чисел b1,…,bk не превышающих 10^9.
 * Для каждого i от 1 до k необходимо вывести индекс 1≤j≤n, для которого A[j]=bi​, или −1, если такого j нет.
 * Example:
 * 5 1 5 8 12 13
 * 5 8 1 23 1 11
 */

/**
 * @param array $arr
 * @param float|string|int $k
 * @return false|float|int
 */
function binary_search($arr, $k)
{
  $count = count($arr);
  $i = 0;
  while ($i < $count){
    $m = floor(($i + $count)/2);
    if($arr[$m] === $k) return $m+1;
    elseif($arr[$m] > $k) $count = $m-1;
    else $i = $m + 1;
  }
  return -1;
}
$line = trim(fgets(STDIN));
$line_two = trim(fgets(STDIN));

$arr = explode(' ', substr($line, 2));
$arr_two = explode(' ', substr($line_two, 2));

foreach ($arr_two as $item){
  echo binary_search($arr, $item) . ' ';
}

//$arr = array();
//for($i = 0; $i < 100; $i ++){
//  $arr[] = $i;
//}
//print_r($arr);
//echo PHP_EOL . binary_search($arr, -1);

