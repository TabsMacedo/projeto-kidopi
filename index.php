<?php

require_once './vendor/autoload.php';
require_once './app/controllers/HomeController.php';
require_once './app/controllers/CovidController.php';
require_once './app/config/database.php';
require_once './app/models/CovidModel.php';


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$requestUri = $_SERVER['REQUEST_URI'];

if ($requestUri === '/' || $requestUri === '') {
    $controller = new HomeController();
    $controller->index();

} elseif (strpos($requestUri, '/api/covid') === 0) {
    $controller = new CovidController();

    if (isset($_GET['lastAccess']) && $_GET['lastAccess'] === 'true') {
        $controller->getLastAccess();
    } elseif (isset($_GET['pais'])) {
        $country = $_GET['pais'];
        $controller->getCovidData($country);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Parâmetros inválidos ou ausentes.']);
    }

} else {
    http_response_code(404);
    echo "Recurso não encontrado!";
}
