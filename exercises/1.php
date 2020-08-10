<?php


class User
{
  public string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function getName(): string
  {
    return $this->name;
  }
}


$user1 = new User('dihauti');
$user2 = $user1;
$user2->setName('alex'); // $user1->getName() выведет alex, так как объект был передан по ссылке.

class Example implements Iterator
{

  protected $storage = [];

  public function set($key, $val)
  {
    $this->storage[$key] = $val;
  }

  public function get($key)
  {
    return $this->storage[$key];
  }

  public function current()
  {
    return current($this->storage);
  }

  public function key()
  {
    return key($this->storage);
  }

  public function next(): void
  {
    next($this->storage);
  }

  public function rewind(): void
  {
    reset($this->storage);
  }

  public function valid(): bool
  {
    return null !== key($this->storage);
  }

}

$test = new Example;
$test->set('foo', 'bar');
$test->set('baz', 42);

foreach ($test as $key => $val) {
  echo $key . '=>' . $val;
  echo "\n";
}

class ExampleModernize implements IteratorAggregate
{

  protected $storage = [];

  public function set($key, $val)
  {
    $this->storage[$key] = $val;
  }

  public function get($key)
  {
    return $this->storage[$key];
  }

  public function getIterator(): Traversable
  {
    return new ArrayIterator($this->storage);
  }
}
