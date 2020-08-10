<?php

function bouncingBall($h, $bounce, $window) {
  if($h>0 and $bounce < 1 and $bounce > 0 and $window < $h){
    $count = 1;
    while($window < $h * $bounce){
      $count += 2;
      $h = $h*$bounce;
    }
    return $count;
  }else{
    return -1;
  }
}

echo bouncingBall(3, 0.66, 1.5);
