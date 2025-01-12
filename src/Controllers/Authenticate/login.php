<?php

use HubCook\Core\Utils\DisplayHelper;
use HubCook\Core\Database\Models\UserModel;

$page = "Authenticate/login";

const ERROR_REQUIRED = "La saisie est obligatoire";
const ERROR_INVALID = "La saisis est invalide";
const ERROR_IDENT = "Le compte ou le mot de passe est inconnu";

$error = [];
$inputData = [];


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $userModel = new UserModel();

  $inputData = filter_input_array(INPUT_POST, [
    'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  ]);

  $username = $inputData['username'];
  $password = $inputData['password'];

  if(empty($username) || empty($password)){
    $error[] = ERROR_REQUIRED;
  }

  if(empty($errors)){
    $user = $userModel->getUser($username);
    if(isset($user) && password_verify($password, $user['password'])){
      $_SESSION = [
        'username' => $username,
        'role' => $user['id_role'],
        'user_id' => $user['id'],
        'user_image' => $user['image']
      ];
      header('Location: /');
    }else{
      $error[] = ERROR_IDENT;
    }
  }

}

$data = [
  'page' => $page,
  'errors' => $error,
  'inputData' => $inputData
];

$router->renderRootLayout($data);