<?php

class Controller
{
  public function view($view, $data = [])
  {
    $viewFile = realpath(__DIR__ . '/../views/' . $view . '.php');
    if ($viewFile && file_exists($viewFile)) {
      extract($data);
      require $viewFile;
    } else {
      die("No se encontró la vista $view.");
    }
  }
}
