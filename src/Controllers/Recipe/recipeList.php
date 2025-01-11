<?php

use HubCook\Core\Database\Models\RecipeModel;

$page = "Recipe/recipeList";

$recipeModel = new RecipeModel();

$recipes = $recipeModel->fetchRecipe();

$data = [
  'page' => $page,
  'recipes' => $recipes
];

$router->renderRootLayout($data);