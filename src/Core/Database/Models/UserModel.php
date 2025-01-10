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
    DisplayHelper::printValue($data);

    $sql = "INSERT INTO users (user_username, user_email, user_password, role_id) 
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
}