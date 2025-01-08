<?php

use HubCook\Core\Router;

const BASE_PATH = __DIR__ . "/../";

//import autload
require BASE_PATH . "vendor/autoload.php";



function printAndDie(mixed $value):void
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

function printValue(mixed $value):void
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router = new Router();

echo "uri";

$router->addGetRoute('/', 'homepage');
printValue($router->getRoutes());

$router->routeTo($url, $method);