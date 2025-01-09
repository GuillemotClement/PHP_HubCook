<?php

use HubCook\Core\Router\Router;

const BASE_PATH = __DIR__ . "/../";

//import autload
require BASE_PATH . "vendor/autoload.php";

$router = new Router();
$router->importFile("src/Core/Router/routes");

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router->routeTo($url, $method);