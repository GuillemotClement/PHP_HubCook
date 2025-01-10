<?php

$router->addGetRoute('/', 'homepage');

$router->addGetRoute('/login', 'Authenticate/login');
$router->addPostRoute('/login', 'Authenticate/login');

$router->addGetRoute('/register', "Authenticate/register");
$router->addPostRoute('/register', "Authenticate/register");

$router->addGetRoute('/logout', 'Authenticate/logout');