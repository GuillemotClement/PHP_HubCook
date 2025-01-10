<?php

use HubCook\Core\Utils\DisplayHelper;
use HubCook\Core\Database\Models\UserModel;
DisplayHelper::printValue($_SESSION);
$page = "Authenticate/register";
const ERROR_REQUIRED = "La saisie est obligatoire";
const ERROR_LENGTH = "La valeur saisis est trop courte";
const ERROR_INVALID = "La saisis est invalide";
const ERROR_CONFIRM = "La confirmation du mot de passe à échouée";


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $userModel = new UserModel();

  $error = [];

  $inputData = filter_input_array(INPUT_POST, [
    'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_EMAIL,
    'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'confirm-password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
  ]);

  $username = $inputData['username'];
  $email = $inputData['email'];
  $password = $inputData['password'];
  $confirmPassword = $inputData['confirm-password'];

  if(empty($username) || empty($email) || empty($password)){
    $error[] = ERROR_REQUIRED;
  }

  if(strlen($username) < 3){
    $error[] = ERROR_LENGTH;
  }

  if(strlen($email) < 10){
    $error[] = ERROR_LENGTH;
  }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error[] = ERROR_INVALID;
  }

  if(strlen($password) < 6){
    $error[] = ERROR_LENGTH;
  }elseif($password !== $confirmPassword){
    $error[] = ERROR_CONFIRM;
  }

  if(empty($error)){
    echo "Ok pour l'inscription";
  }

  $userModel->createUser($inputData);
  //ajout dans la session de nom user

  $_SESSION['username'] = $username;
  header('Location: /');
}

$data = [
  'page' => $page
];
$router->renderRootLayout($data);
//require BASE_PATH . "src/Template/Layout/RootLayout.view.php";