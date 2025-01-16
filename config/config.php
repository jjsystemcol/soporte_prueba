<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'support_requests');
define('DB_USER', 'root');
define('DB_PASS', 'vwr00t');

// Función de conexión a la base de datos
function db_connect()
{
  try {
    return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
  } catch (PDOException $e) {
    die('La conexión a la base de datos falló: ' . $e->getMessage());
  }
}
