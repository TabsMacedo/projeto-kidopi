<?php

// comentário para adicionar mudanças
$host = 'localhost';
$dbname = 'covid19'; 
$username = 'root';
$password = 'senha';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {

    $conn = new PDO($dsn, $username, $password);

    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
