<?php

use HubCook\Core\Utils\DisplayHelper;
use HubCook\Core\Database\Models\UserModel;
use HubCook\Core\Database\Models\RecipeModel;
$idRecipe = $_GET['params'][0];
$page = "Recipe/recipeDetail";
$recipeModel = new RecipeModel();
$recipe = $recipeModel->fetchRecipeDetail($idRecipe);

$username = $recipeModel->getUserName($recipe['id_users']);

$data['page'] = $page;
$data['recipe'] = $recipe;
$data['username'] = $username;


$router->renderRootLayout($data);