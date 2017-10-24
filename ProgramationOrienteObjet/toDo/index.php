<?php
// Charger l'autoloader
require_once 'vendor/autoload.php';
// Charger nos configs
\TODO\Services\FormFactory::$bootstrap = true;
if($_SERVER['SERVER_ADDR'] == "127.0.0.1") {
    \TODO\Kernel\DB::$db_name = "todo_db";
    \TODO\Kernel\DB::$db_login = "root";
    \TODO\Kernel\DB::$db_password = "root";
    \TODO\Kernel\DB::$db_host = "localhost";
}
// Placer ici les données fournies par votre hébergeur
else if($_SERVER['SERVER_ADDR'] == "192.47.12.14") {
    \TODO\Kernel\DB::$db_name = "todo_db_ovh";
    \TODO\Kernel\DB::$db_login = "root";
    \TODO\Kernel\DB::$db_password = "12345577";
    \TODO\Kernel\DB::$db_host = "localhost";
}

// Instancier le Controller Principal
new \TODO\Kernel\Controller();
