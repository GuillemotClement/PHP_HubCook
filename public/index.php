<?php
session_start();
use HubCook\Core\Router\Router;
use HubCook\Core\Database\Database;
use HubCook\Core\Utils\DisplayHelper;

const BASE_PATH = __DIR__ . "/../";

//import autload
require BASE_PATH . "vendor/autoload.php";

$db = new Database();
$router = new Router();
$router->importFile("src/Core/Router/routes");

DisplayHelper::printValue($_SESSION);


$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router->routeTo($url, $method);