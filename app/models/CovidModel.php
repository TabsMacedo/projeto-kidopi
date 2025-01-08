<?php

require_once './app/config/database.php'; 

class CovidModel {

  private $conn;

  public function __construct($conn) {
      $this->conn = $conn;
  }

  public function saveAccess($country, $date) {
      $stmt = $this->conn->prepare("INSERT INTO acessos (pais, data_hora) VALUES (:pais, :data_hora)");
      $stmt->bindValue(':pais', $country, PDO::PARAM_STR); 
      $stmt->bindValue(':data_hora', $date, PDO::PARAM_STR); 
      $stmt->execute();
  }

  public function getLastAccess() {
      $stmt = $this->conn->query("SELECT pais, data_hora FROM acessos ORDER BY data_hora DESC LIMIT 1");
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}


