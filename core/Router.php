<?php
class Router
{
  public function dispatch($uri)
  {
    $uri = trim(parse_url($uri, PHP_URL_PATH), '/');
    $segments = explode('/', $uri);

    $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'SupportRequestController';
    $methodName = isset($segments[1]) ? $segments[1] : 'index';
    $params = array_slice($segments, 2);

    $controllerFile = realpath(__DIR__ . '/../controllers/' . $controllerName . '.php');
    if ($controllerFile && file_exists($controllerFile)) {
      require_once $controllerFile;
      $controller = new $controllerName();

      if (method_exists($controller, $methodName)) {
        call_user_func_array([$controller, $methodName], $params);
      } else {
        die("No se encontró el método $methodName en $controllerName.");
      }
    } else {
      die("No se encontró el controlador $controllerName.");
    }
  }
}