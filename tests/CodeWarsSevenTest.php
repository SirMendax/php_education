<?php

require_once('codewars/codewars_7.php');

class CodeWarsSevenTest extends \PHPUnit\Framework\TestCase
{
  public function testBasics() {
    $this->assertEquals(3, findShort("bitcoin take over the world maybe who knows perhaps"));
    $this->assertEquals(3, findShort("turns out random test cases are easier than writing out basic ones"));
    $this->assertEquals(3, findShort("lets talk about javascript the best language"));
    $this->assertEquals(1, findShort("i want to travel the world writing code one day"));
    $this->assertEquals(2, findShort("Lets all go on holiday somewhere very cold"));
  }
}
