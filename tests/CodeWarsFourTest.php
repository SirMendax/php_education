<?php

require_once("codewars/codewars_4.php.php");

class CodeWarsFourTest extends \PHPUnit\Framework\TestCase
{
  public function testDigits() {
    $this->assertSame(0, descendingOrder(0));
    $this->assertSame(1, descendingOrder(1));
  }

  public function testSmallNumbers() {
    $this->assertSame(51, descendingOrder(15));
    $this->assertSame(2110, descendingOrder(1021));
  }

  public function testBigNumbers() {
    $this->assertSame(987654321, descendingOrder(123456789));
  }
}
