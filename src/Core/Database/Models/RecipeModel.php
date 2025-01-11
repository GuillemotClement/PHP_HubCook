<?php

namespace HubCook\Core\Database\Models;

use HubCook\Core\Database\Database;
use HubCook\Core\Utils\DisplayHelper;

class RecipeModel extends Database
{
  public function createRecipe(array $data){
    $sql = "INSERT INTO recipe (name, describ, instructions, duration, difficulty, image, id_users) 
            VALUES (
                :name, :describ, :instructions, :duration, :difficulty, :image, :id_users
            )";
    $vars = [
      ':name' => $data['name'],
      ':describ' => $data['describ'],
      ':instructions' => $data['instructions'],
      ':duration' => $data['duration'],
      ':difficulty' => $data['difficulty'],
      ':image'=> $data['image'],
      ':id_users' => $_SESSION['user_id']
    ];

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($vars);
  }
}