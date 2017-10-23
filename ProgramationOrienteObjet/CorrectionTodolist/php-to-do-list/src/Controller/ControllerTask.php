<?php
    namespace TODO\Controller;
    use TODO\Entity\Task;
    use TODO\Repository\TaskRepository;
    use TODO\Services\Validator;
    class ControllerTask{
        private $root_path_views;
        public function __construct(){
            $this -> root_path_views =
                dirname(dirname(dirname(__FILE__))).'/views/task/';
            //Sécuriser l'acces a l'ensemble de class ControllerTask
            //recupération de la session
            session_start();
            if(isset($_SESSION['is_logged'])== false || $_SESSION['is_logged'] == false){
                header('Location: ?action=user/login');
            }
        }
        public function index(){
            $prenom = "Marie";
            // Req SQL > récupérer toutes les tasks dans la DB
            $task_repository = new TaskRepository();
            $tasks = $task_repository -> findAllTasks($_SESSION['id']);
            // Passer le résultat de la req SQL à la vue
            // La vue fera une boucle pour parcourir les tasks stockées en DB et les afficher à l'utilisateur
            require_once $this -> root_path_views.'index.php';
        }
        public function show(){
            //echo "salut c'est la méthode show";
            // Créer une fonction dans taskRespository pour récupérer la task à consulter.  Stocker le résultat dans une variable et utiliser cette variable dans la vue pour afficher les données.
            $id_task = isset($_GET['id']) && is_numeric($_GET['id'])?
                (int)$_GET['id']:false;
            $task_repository = new TaskRepository();
            $task = $task_repository -> findTaskById($id_task);
            // SELECT * FROM task WHERE id = $id_task;
            require_once $this -> root_path_views.'show.php';
        }
        // Créer une nouvelle TASK > afficher la vue formulaire
        public function create(){
            $validator = new Validator();
            $messages = $validator -> getFlash();
            require_once $this -> root_path_views.'create.php';
        }
        public function store(){
            $validator = new Validator();
            $test_email = $validator -> checkEmail($_POST['email']);
            if($test_email == false){
                $validator -> setFlash(['mail invalide']);
            }
            // Création d'un objet de type TODO\Entity\Task
            $task = new Task();
            $task -> setIdStatut(2);
            $task -> setIdUser($_SESSION['id']);
            $now = new \DateTime();
            $datetime_sql = $now -> format('Y-m-d\TH:i:s.u');
            $task -> setCreatedAt($datetime_sql);
            $task -> setUpdatedAt($datetime_sql);
            // Récupérer les données du formulaire
            $task -> setTitre($_POST['titre']);
            $task -> setContent($_POST['content']);
            $task -> setResume($_POST['resume']);
            // Enregistrer via une req SQL
            $task_repository = new TaskRepository();
            $task_repository -> create($task);
            // Rediriger vers page index
            header('Location: index.php?action=task/index');
        }
    }