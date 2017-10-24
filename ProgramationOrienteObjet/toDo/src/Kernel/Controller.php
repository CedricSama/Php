<?php
namespace TODO\Kernel;

abstract class Controller
{

    public function __construct()
    {
        // Récupération du param action dans l'url
        $action = isset($_GET['action']) ? $_GET['action'] : false ;
        // On doit déduir de l'action le nom du sous controller à instancier et le nom de la méthode à appeler pour afficher la vue demandée.
        $action = explode("/",$action);
        if(count($action)!=2) {
            $this->notFound404();
        } else {
            // print_r($action);
            // die();
            $controller_name = $action[0];
            $controller_action = $action[1];
            //$call = new \Mailer\Controller\ControllerMailer();
            //$call->showForm();
            $controller_str = "\\TODO\\Controller\\Controller$controller_name";
            //var_dump(class_exists($controller_str));
            if(class_exists($controller_str) == false) {
                $this->notFound404();
            }

            $controller = new $controller_str();
            if(method_exists($controller,$controller_action) == false) {
                $this->notFound404();
            }
            $controller->$controller_action();
        }
    }

    protected function notFound404() {
        header('HTTP/1.0 404 Not Found');
        die("Fichier introuvable");
    }
    protected function forbiden403() {
        header('HTTP/1.0 404 Forbiden');
        die("Acces interdit");
    }

}