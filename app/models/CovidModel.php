<?php
class CovidModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function saveAccess($lastAccess)
    {
        $query = "INSERT INTO acessos (pais, data_hora) VALUES (:pais, :data_hora)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':pais', $lastAccess['pais']);
        $stmt->bindParam(':data_hora', $lastAccess['data_hora']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getLastAccess()
    {
        $stmt = $this->conn->query("SELECT pais, data_hora FROM acessos ORDER BY data_hora DESC LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


