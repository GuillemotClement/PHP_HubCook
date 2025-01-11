<?php

namespace HubCook\Core\Database\Models;

use HubCook\Core\Database\Database;
use HubCook\Core\Utils\DisplayHelper;

class UserModel extends Database
{
  public function fetchUser()
  {
    $result = $this->fetchAll("user");
    var_dump($result);
    return $result;
  }

  public function createUser(array $data)
  {
    $sql = "INSERT INTO users (username, email, password, id_role) 
    VALUES (
        :username, :email, :password, :role                                                                  
    )";
    $vars = [
      ':username' => $data['username'],
      ':email' => $data['email'],
      ':password' =>$data['password'],
      ':role' => 2
    ];
    $stmt = $this->getPdo()->prepare($sql);
    $stmt->execute($vars);
  }

  public function getUser(string $username){
    $sql = "SELECT id, username, password, id_role FROM users WHERE username LIKE :username";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    $row = $stmt->fetch();
    return $row;
  }
}