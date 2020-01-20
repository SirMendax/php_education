<?php


namespace framework;


use Exception;

class Router
{
  /**
   * @var array
   */
  private array $router = [];

  /**
   * @var array
   */
  private array $matchRouter = [];

  /**
   * @var string
   */
  private string $url;

  /**
   * @var string
   */
  private string $httpMethod;

  /**
   * @var array
   */
  private array $params = [];


  /**
   * @param string $url
   * @param string $method
   */
  public function __construct(string $url, string $httpMethod)
  {
    $this->url = rtrim($url, '/');
    $this->httpMethod = $httpMethod;
  }

  /**
   *  set get request http method for route
   * @throws Exception
   */
  public function get(string $pattern, string $method)
  {
    $this->addRoute("GET", $pattern, $method);
  }

  /**
   *  set post request http method for route
   * @param string $pattern
   * @throws Exception
   */
  public function post(string $pattern, string $method)
  {
    $this->addRoute('POST', $pattern, $method);
  }

  /**
   *  set put request http method for route
   * @param string $pattern
   * @throws Exception
   */
  public function put(string $pattern, string $method)
  {
    $this->addRoute('PUT', $pattern, $method);
  }

  /**
   *  set delete request http method for route
   * @param string $pattern
   * @throws Exception
   */
  public function delete(string $pattern, string $method)
  {
    $this->addRoute('DELETE', $pattern, $method);
  }

  /**
   *  add route object into router var
   * @param string $httpMethod
   * @param string $pattern
   * @param string $method
   * @throws Exception
   */
  public function addRoute(string $httpMethod, string $pattern, string $method)
  {
    array_push($this->router, new Route($httpMethod, $pattern, $method));
  }

  /**
   *  filter requests by http method
   */
  private function getMatchRoutersByRequestMethod()
  {
    foreach ($this->router as $value) {
      if (strtoupper($this->httpMethod) == $value->getHttpMethod())
        array_push($this->matchRouter, $value);
    }
  }

  /**
   * filter route patterns by url request
   * @param array $patterns
   */
  private function getMatchRoutersByPattern(array $patterns)
  {
    $this->matchRouter = [];
    foreach ($patterns as $value) {
      if ($this->dispatch($this->cleanUrl($this->url), $value->getPattern()))
        array_push($this->matchRouter, $value);
    }
  }

  /**
   *  dispatch url and pattern
   * @param string $url
   * @param string $pattern
   * @return bool
   */
  public function dispatch(string $url, string $pattern)
  {
    preg_match_all('@:([\w]+)@', $pattern, $params, PREG_PATTERN_ORDER);

    $patternAsRegex = preg_replace_callback('@:([\w]+)@', [$this, 'convertPatternToRegex'], $pattern);

    if (substr($pattern, -1) === '/') {
      $patternAsRegex = $patternAsRegex . '?';
    }
    $patternAsRegex = '@^' . $patternAsRegex . '$@';

    // check match request url
    if (preg_match($patternAsRegex, $url, $paramsValue)) {
      array_shift($paramsValue);
      foreach ($params[0] as $key => $value) {
        $val = substr($value, 1);
        if ($paramsValue[$val]) {
          $this->setParams($val, urlencode($paramsValue[$val]));
        }
      }

      return true;
    }

    return false;
  }

  /**
   * @throws Exception
   */
  public function run()
  {
    if (!is_array($this->router) || empty($this->router))
      throw new Exception('NON-Object Route Set');
    $this->getMatchRoutersByRequestMethod();
    $this->getMatchRoutersByPattern($this->matchRouter);
    if (!$this->matchRouter || empty($this->matchRouter)) {
      echo 404;
    } else {
      $this->runController($this->matchRouter[0]->getMethod(), $this->params);
    }
  }

  /**
   * @param string $controller
   * @param array $params
   */
  private function runController(string $controller, array $params)
  {
    $parts = explode('@', $controller);
    $controller = 'src\\http\\Controllers\\' . $parts[0];
    if(class_exists($controller)){
      $controller = new $controller();
    }
    $method = $parts[1];
    if (method_exists($controller, $method)) {
      $controller->$method();
    }
  }

  /**
   *  get router
   */
  public function getRouter()
  {
    return $this->router;
  }

  /**
   * set param
   */
  private function setParams($key, $value)
  {
    $this->params[$key] = $value;
  }

  /**
   * Convert Pattern To Regex
   * @param $matches
   * @return string
   */
  private function convertPatternToRegex($matches)
  {
    $key = str_replace(':', '', $matches[0]);
    return '(?P<' . $key . '>[a-zA-Z0-9_\-\.\!\~\*\\\'\(\)\:\@\&\=\$\+,%]+)';
  }

  protected function cleanUrl($url): string
  {
    return str_replace(['%20', ' '], '-', $url);
  }

}
