<?php
// Charger l'autoloader
require_once "vendor/autoload.php";
// Charger les configs
//print_r($_SERVER);
//die();
if($_SERVER['REMOTE_ADDR'] == "127.0.0.1" || $_SERVER['REMOTE_ADDR'] == "::1") {
    \TODO\Kernel\DB::$db_login = "root";
    \TODO\Kernel\DB::$db_password = null;
    \TODO\Kernel\DB::$db_host = "localhost";
    \TODO\Kernel\DB::$db_name = "todolist_db";
}
// Si serveur de prod
else if($_SERVER['REMOTE_ADDR'] == "192.168.12.9") {
    \TODO\Kernel\DB::$db_login = "login_prod_db";
    \TODO\Kernel\DB::$db_password = "password_prod_db";
    \TODO\Kernel\DB::$db_host = "localhost";
    \TODO\Kernel\DB::$db_name = "todolist_prod_db";
}
//Longueur mot de passe
\TODO\Services\Validator::$password_lenght = 9;
// Instancier le controller principal
new \TODO\Kernel\Controller();

//http://localhost:8000/?action=task/index