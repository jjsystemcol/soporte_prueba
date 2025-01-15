<?php
require_once realpath(__DIR__ . '/../config/config.php') ?: die('Config file not found.');
require_once realpath(__DIR__ . '/../core/Router.php') ?: die('Router file not found.');
require_once realpath(__DIR__ . '/../core/Controller.php') ?: die('Controller file not found.');
require_once realpath(__DIR__ . '/../core/Model.php') ?: die('Model file not found.');

// Autoloader for classes
spl_autoload_register(function ($class) {
  $paths = [
    realpath(__DIR__ . '/../models/' . $class . '.php'),
    realpath(__DIR__ . '/../controllers/' . $class . '.php'),
  ];
  foreach ($paths as $path) {
    if ($path && file_exists($path)) {
      require_once $path;
      break;
    }
  }
});

// Start routing
$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);
