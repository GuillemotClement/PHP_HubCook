<?php

use HubCook\Core\Utils\DisplayHelper;
use HubCook\Core\Database\Models\UserModel;

$page = "Authenticate/login";

$userEntity = new UserModel();
$users = $userEntity->fetchUser();

var_dump($users);

require BASE_PATH."src/Template/Layout/RootLayout.view.php";