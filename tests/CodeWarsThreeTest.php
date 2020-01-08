<?php

require_once("codewars/codewars_3.php.php");

class CodeWarsThreeTest extends \PHPUnit\Framework\TestCase
{
  public function testReturnCorrectText() {

    $this->assertEquals( 'no one likes this', likes( [] ) );
    $this->assertEquals( 'Peter likes this', likes( [ 'Peter' ] ) );
    $this->assertEquals( 'Jacob and Alex like this', likes( [ 'Jacob', 'Alex' ] ) );
    $this->assertEquals( 'Max, John and Mark like this', likes( [ 'Max', 'John', 'Mark' ]) );
    $this->assertEquals( 'Alex, Jacob and 2 others like this', likes( [ 'Alex', 'Jacob', 'Mark', 'Max' ] ) );
  }
}
