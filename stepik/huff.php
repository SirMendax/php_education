<?php

abstract class Node
{
  public string $char;

  public function code($code)
  {
    $this->code = $code;
    $arr[$this->char] = $code;
  }
}

final class Leaf extends Node
{
  public string $char;
  public string $code;

  public function __construct($char)
  {
    $this->char = $char;
  }

  public function code($code)
  {
    parent::code($code);
  }

}

final class InternalNode extends Node
{
  public Node $left;
  public Node $right;

  public function __construct($left, $right)
  {
    $this->left = $left;
    $this->right = $right;
  }

  public function code($code)
  {
    $this->left->code($code . '0');
    $this->right->code($code . '1');
  }
}

function recursive($huff_tree, $arr)
{
  $buf = $arr;
  foreach ($huff_tree as $item){
    if($item instanceof Leaf){
      $buf[$item->char] = $item->code;
      print_r($item->char . ': ' . $item->code . PHP_EOL);
    }else{
      return recursive($item, $buf);
    }
  }
  return $buf;
}

function code_huff($inputStr)
{
  $code = "";
  $arr = str_split($inputStr);

  if (count($arr) === 1){
    $code = "0";
    print_r('1 1');
    print_r($inputStr . ': ' . $code);
    return $code;
  }

  $symbolRate = array_count_values($arr);
  $pq = new SplPriorityQueue();
  foreach ($symbolRate as $k => $v) {
    $pq->insert([new Leaf($k), $v], -$v);
  }

  while (count($pq) > 1) {
    $last = $pq->extract();
    $next = $pq->extract();
    $pq->insert([new InternalNode($next[0], $last[0]), $last[1] + $next[1]], -$next[1]);
  }
  $root = $pq->extract()[0];
  $root->code("");
  $arr_huff = [];
  $arr_huff = recursive($root, $arr_huff);
  foreach ($arr as $char){
    $code .= $arr_huff[$char];
  }
  return $code;
}

$str = trim(fgets(STDIN));
print_r(code_huff($str));
