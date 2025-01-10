<?php

namespace HubCook\Core\Database;

use PDO;

class Database
{
  public $pdo;

  public function __construct()
  {
    $this->pdo = $this->getPdo();
  }

  protected function getPdo(): PDO
  {
    try {
      $db = new PDO("pgsql:host=localhost;port=5432;dbname=hubcook;", "clement", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]);
    } catch (PDOException $e) {
      echo "La connexion à la base de donnée à échouée : " .
        $e->getMessage();
    }
    return $db;
  }

  public function fetchAll(string $table)
  {
    $sql = "SELECT * FROM $table";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  }

  public function showTables()
  {
    $sql = "SELECT table_name 
            FROM information_schema.tables 
            WHERE table_schema = 'public'";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des tables
    echo "Tables dans la base de données :<br>";
    foreach ($tables as $table) {
      echo "- " . $table['table_name'] . "<br>";
    }
  }
}