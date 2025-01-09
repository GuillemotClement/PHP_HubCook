<?php

namespace HubCook\Core\Utils;

use JetBrains\PhpStorm\NoReturn;

class DisplayHelper
{
  public static function printValue(string $value):void
  {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
  }

  #[NoReturn] public static function printAndDie(string $value): void
  {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
  }
}