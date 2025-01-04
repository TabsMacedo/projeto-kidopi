<!-- O Index.php vai fazer o redirecionamento para home, e para api controller -->
<!-- carregar os arquivos que preciso conectar antes -->
<?php
require_once './app/controllers/HomeController.php';

$requestUri = $_SERVER['REQUEST_URI'];

if ($requestUri === '/' || $requestUri === '') {
    $controller = new HomeController();
    $controller->index();
} else {
    echo "Recurso não encontrado!";
}
