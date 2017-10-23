<?php
namespace TODO\Kernel;

class Controller
{
    public function __construct()
    {
//        print_r($_GET);
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $actions = explode('/',$action);
        if(!$action || count($actions)!=2) {
            $this->notFound404();
        }
        $controller_name = ucfirst($actions[0]);
        $controller_action = $actions[1];
        $controller ="\\TODO\\Controller\\Controller$controller_name";
        // > Déclencher une erreur 404 si la classe du controller instanciée n'existe pas
        if(class_exists($controller) == false) {
            $this->notFound404();
        }
        $controller = new $controller;
        // > Déclencher une erreur 404 si la méthode (l'action) appelée dans le controller n'existe pas
        if(method_exists($controller,$controller_action) == false) {
            $this->notFound404();
        }
        $controller->$controller_action();
    }

    public function notFound404() {
        // Générer une erreur 404 via le protocole HTTP
        header('HTTP/1.0 404 Not Found');
        die('Page Introuvable');
    }



}