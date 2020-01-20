<?php


namespace framework;


use Exception;

class Route
{
  /**
   * @var string
   */
  private string $httpMethod;

  /**
   * @var string
   */
  private string $pattern;

  /**
   * @var array
   */
  private array $httpMethods = ['GET', 'POST', 'PUT', 'DELETE', 'OPTION'];

  /**
   * @var string
   */
  private string $method;

  /**
   *  construct function
   * @param string $method
   * @param string $pattern
   * @throws Exception
   */
  public function __construct(string $httpMethod, string $pattern, string $method)
  {
    $this->httpMethod = $this->validate(strtoupper($httpMethod));
    $this->pattern = $this->cleanUrl($pattern);
    $this->method = $method;
  }

  /**
   *  get method
   */
  public function getHttpMethod() :string
  {
    return $this->httpMethod;
  }

  /**
   *  get pattern
   */
  public function getPattern() :string
  {
    return $this->pattern;
  }

  /**
   * @return string
   */
  public function getMethod() {
    return $this->method;
  }

  /**
   * @param $url
   * @return string|string[]
   */
  protected function cleanUrl($url) :string
  {
    return str_replace(['%20', ' '], '-', $url);
  }

  /**
   *  check valid method
   * @param string $method
   * @return string
   * @throws Exception
   */
  private function validate(string $method)
  {
    if (in_array(strtoupper($method), $this->httpMethods))
      return $method;
    throw new Exception('Invalid Method Name');
  }
}
