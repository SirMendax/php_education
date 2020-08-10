<?php

require_once("codewars/codewars_5.php.php");

class CodeWarsFiveTest extends \PHPUnit\Framework\TestCase
{
  // test function names should start with "test"
  public function testBasics() {
    $this->assertEquals(1000, solution("M"));
    $this->assertEquals(50, solution("L"));
    $this->assertEquals(4, solution("IV"));
  }

  public function testComplex() {
    $this->assertEquals(2017, solution("MMXVII"));
    $this->assertEquals(1337, solution("MCCCXXXVII"));
  }
}
