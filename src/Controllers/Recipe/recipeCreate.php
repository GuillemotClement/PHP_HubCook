<?php

use HubCook\Core\Utils\DisplayHelper;
use HubCook\Core\Database\Models\RecipeModel;

$page = "Recipe/recipeCreate";
$data = [
  'page' => $page,
];

const ERROR_REQUIRED = "La saisie est obligatoire";
const ERROR_LENGTH = "La valeur saisis est trop courte";


$error     = [];
$inputDate = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $recipeModel = new RecipeModel();

  $inputData = filter_input_array(INPUT_POST, [
    'name'         => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'describ'      => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'instructions' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'duration'     => FILTER_SANITIZE_NUMBER_INT,
    "difficulty"   => FILTER_SANITIZE_NUMBER_INT,
    "image"        => FILTER_SANITIZE_URL,
  ]);

  $name         = $inputData['name'];
  $describ      = $inputData['describ'];
  $instructions = $inputData['instructions'];
  $duration     = $inputData['duration'];
  $diffulty     = $inputData['difficulty'];
  $image        = $inputData['image'];

  if (empty($name)) {
    $error[] = [
      'name' => ERROR_REQUIRED,
    ];
  } elseif (strlen($name) < 5) {
    $error[] = [
      'name' => ERROR_LENGTH,
    ];
  }

  if (empty($describ)) {
    $error[] = [
      'describ' => ERROR_REQUIRED,
    ];
  } elseif (strlen($describ) < 20){
    $error[] = [
      'describ' => ERROR_LENGTH
    ];
  }

  if (empty($instructions)) {
    $error[] = [
      'instructions' => ERROR_REQUIRED,
    ];
  } elseif (strlen($instructions) < 20){
    $error[] = [
      'instructions' => ERROR_LENGTH
    ];
  }

  if (empty($duration)) {
    $error[] = [
      'duration' => ERROR_REQUIRED,
    ];
  }

  if (empty($diffulty)) {
    $error[] = [
      'diffulty' => ERROR_REQUIRED,
    ];
  }

  if (empty($image)) {
    $error[] = [
      'image' => ERROR_REQUIRED,
    ];
  }

  $data[] = [
    'errors' => $error
  ];

  if(empty($error)){
    $recipeModel->createRecipe($inputData);
    header('Location: /recipe');
  }
}


$router->renderRootLayout($data);