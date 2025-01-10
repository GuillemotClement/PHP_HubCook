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
}