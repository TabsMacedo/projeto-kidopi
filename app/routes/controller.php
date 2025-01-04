<?php
header('Content-Type: application/json');

// Teste simples para confirmar que o fetch está chegando aqui
echo json_encode(["status" => "success", "message" => "Chegou no routes/controller.php"]);
