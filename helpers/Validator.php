<?php

class Validator
{
  public static function validate($data, $rules)
  {
    $errors = [];

    foreach ($rules as $field => $rule) {
      $rulesArray = explode('|', $rule);

      foreach ($rulesArray as $r) {
        if ($r == 'required' && empty($data[$field])) {
          $errors[$field] = "$field es requerido";
        }

        if ($r == 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
          $errors[$field] = "$field debe ser un correo electrónico válido";
        }
      }
    }

    return $errors;
  }
}
