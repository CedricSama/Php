<?php
    namespace TODO\Controller;
    use TODO\Entity\User;
    use TODO\Repository\UserRepository;
    use TODO\Services\Validator;
    class ControllerUser{
        private $root_path_views;
        private $user_repository;
        private $validator;
        private $messages;
        public function __construct(){
            $this -> root_path_views = dirname(dirname(dirname(__FILE__))).'/views/user/';
            $this -> user_repository = new UserRepository();
            $this->validator = new Validator();
            $this -> messages = $this -> validator -> getFlash();
        }
        public function create(){
            require_once $this -> root_path_views.'create.php';
        }
        /**
         * Création en memoire "vive" de
         * l'instence User avec hydratation des données en provenance du formulaire grace a la super global $_POST
         */
        public function store(){
            $record = true;
            $messages = [];
            //Vérifié que  les champs sont tous rensigné;
            $is_empty = $this -> validator -> isEmpty($_POST);
            if($is_empty){
                $record = false;
                $messages[] = 'Tous les messages sont obligatoires';
                $this -> validator -> setFlash($messages);
            }
            //Vérifié le format mail
            if($this -> validator -> checkEmail($_POST['email']) == false){
                $record = false;
                $messages[] = 'Votre Email est incorrect';
                $this -> validator -> setFlash($messages);
            }
            // Vérifié le format du password
            if($this -> validator -> checkPassword($_POST['password']) == false){
                $record = false;
                $password_lenght = Validator::$password_lenght;
                $messages[] = "Votre Password est trop court. $password_lenght caractere minimum";
                $this -> validator -> setFlash($messages);
            }
            $user_login = $this -> user_repository -> findOneUserBy('login', $_POST['login']);
            if(count($user_login) == 1){
            }
            if($record){
                $user = new User();
                $user -> setLogin($_POST['login']);
                $user -> setPassword($_POST['password']);
                $user -> setEmail($_POST['email']);
                $user -> setPrenom($_POST['prenom']);
                $user -> setNom($_POST['nom']);
                $res = $this -> user_repository -> createUser($user);
                if($res){
                    session_start();
                    $_SESSION['is_logged'] = true;
                    $_SESSION['is_admin'] = $user -> getIsAdmin();
                    $_SESSION['id'] = $user -> getIdUser();
                    $_SESSION['prenom'] = $user -> getPrenom();
                    header('Location: ?action=user/login');
                }
                header('Location: ?action=task/index');
                exit();
            }else{
                header('Location: ?action=user/create');
            }
        }
        /**
         * 
         */
        public function login(){
            require_once $this -> root_path_views."login.php";
        }
        /**
         * 
         */
        public function executeLogin(){
            $login = true;
            $messages = [];
            //Vérifié que  les champs sont tous rensigné;
            $is_empty = $this -> validator -> isEmpty($_POST);
            if($is_empty){
                $login = false;
                $messages[] = 'Tous les messages sont obligatoires';
                $this -> validator -> setFlash($messages);
            }
            if($login){
                $user = new User();
                $user -> setLogin($_POST['login']);
                $user -> setPassword($_POST['password']);
                $user_sql = $this -> user_repository -> login($user);
                if($user_sql == 1){
                    //Démarrer une session
                    session_start();
                    $_SESSION['is_logged'] = true;
                    $_SESSION['is_admin'] = $user_sql[0] -> getIsAdmin();
                    $_SESSION['id'] = $user_sql[0] -> getIdUser();
                    $_SESSION['prenom'] = $user_sql[0] -> getPrenom();
                    header('Location: ?action=user/login');
                }else{
                    echo "impossilbe de vous identifier";
                    $this -> messages -> setFlash($messages);
                    header('Location: ?action=user/login');
                }
            }else{
                header('Location: ?action=user/login');
            }
        }
        /**
         *
         */
        public function logout(){
            session_start();
            session_destroy();
            header('Location: ?action=user/login');
        }
    }