<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 12/06/2017
 * Time: 16:59
 */

namespace TODO\Controller;


use TODO\Kernel\Controller;
use TODO\Repository\TaskRepository;

class ControllerTask extends Controller
{
    private $root_path_views;
    private $task_repository;
    private $statut_repository;

    public function  __construct()
    {
        //parent::__construct
        $this->root_path_views=dirname(dirname(__FILE__)).'/Views/Task/';
        $this->statut_repository_ = new StatutRepository();

      //Récuperer la session du User
        session_start();
        if(isset($_SESSION['is_logged'])== false || $_SESSION['is_logged'] ==false) {
            $this->forbiden403();
        }
                else{
            print_r($_SESSION);
            }

        }

    public function showAll() {
        $tasks = $this->task_repository->findAllTask();
       // var_dump($tasks);
       require_once $this->root_path_views. 'showAll.php';
    }
    public function manageTask(){
        require_once $this->root_path_views.'manage.php';
    }
}