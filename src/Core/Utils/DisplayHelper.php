<?php

namespace HubCook\Core\Utils;

use JetBrains\PhpStorm\NoReturn;

class DisplayHelper
{
  public static function printValue(mixed $value):void
  {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
  }

  #[NoReturn] public static function printAndDie(mixed $value): void
  {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
  }
}