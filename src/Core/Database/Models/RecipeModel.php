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

  public function fetchRecipe()
  {
    $sql = "SELECT * FROM recipe LIMIT 12";
    $stmt = $this->pdo->query($sql);
    $row = $stmt->fetchAll();
    return $row;
  }

  public function fetchRecipeDetail(int $id): array
  {
    $sql = "SELECT * FROM recipe WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    return $row;
  }

  public function getUserName(int $id)
  {
    $sql = "SELECT username FROM users WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    return $row;
  }
}