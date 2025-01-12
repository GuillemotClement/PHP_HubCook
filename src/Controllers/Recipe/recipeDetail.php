<?php

use HubCook\Core\Utils\DisplayHelper;

DisplayHelper::printValue($_GET);

$page = "Recipe/recipeDetail";

$data['page'] = $page;

$router->renderRootLayout($data);