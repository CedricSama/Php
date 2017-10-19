<?php
    namespace TODO\Controller;
    use TODO\Repository\TaskRepository;
    class ControllerTask{
        private $root_path_views;
        /**
         * ControllerTask constructor.
         */
        public function __construct(){
            $this -> root_path_views =
                dirname(dirname(dirname(__FILE__))).'/views/task/';
        }
        public function index(){
            $prenom = "Jean-Michel";
            //echo "Salut c'est la méthode index de TaskController";
            //Req SQL > recuperer toutes les task dans la DB;
            $task_repository = new TaskRepository();
            $tasks = $task_repository ->findAllTask();
            //Passer le reulstat a la req SQL a la vue;
            // La vue fera une boucle pour parcourir les tasks stockées dans la DB et les afficher a l'utilisateur
            require_once($this -> root_path_views.'index.php');
        }
        public function show(){
            echo "salut c'est la méthode show";
        }
    }
    
    // quand tu url ça "action=task/index" ça donne ça "Salut c'est la méthode index de TaskController";