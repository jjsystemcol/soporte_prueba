<?php
require_once realpath(__DIR__ . '/../config/config.php') ?: die('Archivo Config no encontrado.');
require_once realpath(__DIR__ . '/../core/Router.php') ?: die('Archivo Router no encontrado.');
require_once realpath(__DIR__ . '/../core/Controller.php') ?: die('Archivo Controller no encontrado..');
require_once realpath(__DIR__ . '/../core/Model.php') ?: die('Archivo Model no encontrado..');

// Iniciar enrutamiento
$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);

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

