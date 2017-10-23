<?php
    namespace TODO\Controller;
    use TODO\Model\Entity\Task;
    use TODO\Model\Repository\TaskRepository;
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
            $tasks = $task_repository -> findAllTask();
            //Passer le reulstat a la req SQL a la vue;
            // La vue fera une boucle pour parcourir les tasks stockées dans la DB et les afficher a l'utilisateur
            require_once($this -> root_path_views.'index.php');
        }
        public function show(){
            //echo "salut c'est la méthode show";
            $id_task = isset($_GET['id']) && is_numeric($_GET['id'])? (int)$_GET['id']:false;
            $task_repository = new TaskRepository();
            $task = $task_repository -> findTaskById($id_task);
            //var_dump($task);
            //die();
            //SELECT * FROM task WHERE task.id_task = $_GET['id]
            //Creer une fonction dans taskRepository pour recuperer la task a consulter.
            // Stocker le resultat dans une variable et utiliser cette variable dans la vue pour afficher les données
            require_once($this -> root_path_views.'show.php');
        }
        /**
         * Crée une nouvelle Task > afficher la vue formulaire
         */
        public function create(){
            require_once($this -> root_path_views.'create.php');
        }
        /**
         * Création d'un objet de type TODO\Entity\Task
         * Recupere les donnée du formulaire
         * Enregistre via une requete SQL
         * et redirige svers page index
         */
        public function store(){
            $task = new Task();
            $task -> setIdStatut(3);
            $task -> setIdUser(1);
            $now = new \DateTime();
            $datetime_sql = $now -> format('Y-m-d\TH:i:s.u');
            $task -> setCreatedAt($datetime_sql);
            $task -> setUpdatedAt($datetime_sql);
            //Ensuite Hydrater l'instence
            $task -> setTitre($_POST['titre']);
            $task -> setResume($_POST['resume']);
            $task -> setContent($_POST['content']);
            //SQL Request
            $task_repository = new TaskRepository();
            $task_repository -> create($task);
            // isset($_POST['titre'])
            //$this -> index();
            header('Location: ?action=task/index');
        }
    }
    
    // quand tu url ça "action=task/index" ça donne ça "Salut c'est la méthode index de TaskController";