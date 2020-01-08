<?php

function pascals_triangle($n)
{
  $array = [];
  $i = -1;
  while ($i < $n - 1) {
    $i++;
    if ($i == 0) {
      $array[] = 1;
    } else {
      $k = -1;
      while ($k < $i) {
        $k++;
        $array[] = binomial($i, $k);
      }
    }
  }
  return $array;
}

function binomial($n, $k)
{
  $c = 1;
  if ($n - $k > $k) {
    $k = $n - $k;
  }
  for ($i = $k + 1; $i <= $n; $i++)
    $c = $c * $i;
  for ($i = 1; $i < ($n - $k + 1); $i++)
    $c = $c / $i;
  return $c;
}

