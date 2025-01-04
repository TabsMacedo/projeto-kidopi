<?php

class HomeController {
    public function index() {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        
        $viewPath = "$root/app/views/home.php";

        require_once $viewPath;
      
    }
}
