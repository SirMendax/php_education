<?php

class Node
{
    public string $code;

    public function code($code)
    {
        $this->code = $code;
    }
}

final class Leaf extends Node
{
    public $char;
    public function __construct($char)
    {
        $this->char = $char;
    }

    public function code($code){
        parent::code($code);
        print_r($this->char . ":" . $code . PHP_EOL);
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
        parent::code($code);
        $this->left->code($code . '1');
        $this->right->code($code . '0');
    }
}

function code_huff($inputStr)
{
    //first step
    $arr = str_split($inputStr);
    $symbolRate = array_count_values($arr);
    $numberUniqueSymbol = count($symbolRate);

    $pq = new SplPriorityQueue();
    foreach($symbolRate as $k=>$v){
        $pq->insert([new Leaf($k), $v], -$v);
    }

    while(count($pq) > 1){
        $last = $pq->extract();
        $next = $pq->extract();
        $pq->insert([new InternalNode($last[0], $next[0]), $last[1]+$next[1]], -$next[1]);
    }
    print_r($pq);
    $root = $pq->extract()[0];
    $root->code("");
}

$str = trim(fgets(STDIN));
code_huff($str);

/**
 * abdc
 *
 * a - 0
 *
 * bdc - 1
 *
 * b - 1
 *
 * dc - 0
 *
 * d - 1
 * c - 0
 *
 * a:0;
 * b:10;
 * c:110
 * d:111
 *
 */